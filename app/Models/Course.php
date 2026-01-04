<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    /**
     * Массово заполняемые поля
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_paid',
        'price',
    ];

    /**
     * Приведение типов
     */
    protected $casts = [
        'is_paid' => 'boolean',
        'price'   => 'integer',
    ];

    /**
     * Связь: курс → уроки
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class)
            ->orderBy('order');
    }

    /**
     * Связь: курс → записи студентов
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Пользователи курса
     */
    public function students()
    {
        return $this->belongsToMany(
            User::class,
            'enrollments'
        )->withTimestamps();
    }

    /**
     * Проверка: курс платный?
     */
    public function isPaid(): bool
    {
        return $this->is_paid === true;
    }

    /**
     * Доступ пользователю
     */
    public function hasAccess(?User $user): bool
    {
        if (!$this->is_paid) {
            return true;
        }

        if (!$user) {
            return false;
        }

        return $this->students()
            ->where('user_id', $user->id)
            ->exists();
    }
    public function progressFor(User $user): int
    {
        $total = $this->lessons()
            ->where('is_active', true)
            ->count();

        if ($total === 0) {
            return 0;
        }

        $completed = LessonProgress::where('user_id', $user->id)
            ->whereIn(
                'lesson_id',
                $this->lessons()->where('is_active', true)->pluck('id')
            )
            ->where('completed', true)
            ->count();

        return (int) round(($completed / $total) * 100);
    }   
}
