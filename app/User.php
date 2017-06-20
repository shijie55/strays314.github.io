<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mailer\PasswordResetMailer;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'confirmation_token', 'api_token'
    ];

    // 全部允许批量插入
    // protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_active === 1;
    }

    /**
     * 重写密码重置邮件方法
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $mail = new PasswordResetMailer();

        $mail->sendPasswordResetMail($token, $this->email, $this->name);
    }

    /**
     * 点赞（多对多）
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function votes()
    {
        return $this->belongsToMany(Answer::class, 'votes', 'user_id', 'answer_id')->withTimestamps();
    }

    /**
     * 点赞
     *
     * @param $answer_id
     * @return array
     */
    public function voteForThis($answer_id)
    {
        return $this->votes()->toggle($answer_id);
    }

    public function answer()
    {
        // 一对多
        // 每一位用户都可以有多条回答
        return $this->hasMany(Answer::class);
    }

    /**
     * 关注（多对多）
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(self::class, 'followers', 'follower_id', 'followed_id')
            ->withTimestamps();
    }

    public function follows()
    {
        return $this->belongsToMany(Question::class, 'user_question')->withTimestamps();
    }

    /**
     * @param $question_id
     * @return array
     */
    public function followThis($question_id)
    {
        // toggle触发时，若user_question表中
        // 不存在与user_id和question_id对应的记录则创建记录
        // 若存在则删除记录
        return $this->follows()->toggle($question_id);
    }

    /**
     * 判断已登录用户是否已关注该问题
     *
     * @param $question_id
     * @return bool
     */
    public function followed($question_id)
    {
        // !!连续取反两次，强制转换为bool值
        return !! $this->follows()->where('question_id', $question_id)->count();
    }

    /**
     * 判断已登录用户是否已关注该用户
     *
     * @param $user_id
     * @return bool
     */
    public function followedUser($user_id)
    {
        // !!连续取反两次，强制转换为bool值
        return !! $this->followers()->where('followed_id', $user_id)->count();
    }

    /**
     * 判断已登录用户是否已关注该问题
     *
     * @param $question_id
     * @return bool
     */
    public function votedAnswer($answer_id)
    {
        // !!连续取反两次，强制转换为bool值
        return !! $this->votes()->where('answer_id', $answer_id)->count();
    }

    /**
     * 关注用户
     *
     * @param $user_id
     * @return array
     */
    public function followThisUser($user_id)
    {
        // toggle触发时，若follower表中
        // 不存在与follower_id和followed_id对应的记录则创建记录
        // 若存在则删除记录
        return $this->followers()->toggle($user_id);
    }

    /**
     * 判断该问题是否属于已登录用户
     *
     * @param Question $model
     * @return bool
     */
    public function owns(Question $model)
    {
        return $this->id == $model->user_id;
    }

    /**
     * 私信（一对多）
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function message()
    {
        return $this->hasMany(Message::class, 'to_user_id');
    }


}
