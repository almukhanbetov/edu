<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Lesson extends Model
{
    use HasFactory;
     protected $fillable = [
        'course_id',
        'title',
        'content',
        'video_url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Урок принадлежит курсу
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Прогресс пользователей по уроку
     */
    public function progress()
    {
        return $this->hasMany(LessonProgress::class);
    }

    /**
     * Проверка: завершён ли урок пользователем
     */
    public function isCompletedBy(User $user): bool
    {
        return $this->progress()
            ->where('user_id', $user->id)
            ->where('completed', true)
            ->exists();
    }
}
