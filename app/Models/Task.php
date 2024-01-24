<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use App\Scopes\UserTrackingScope;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use HasUuids;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'status',
        'deadline',
        'estimated_hours',
        'project_id',
        'created_user_id',
        'assigned_user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'deadline' => 'datetime',
        'estimated_hours' => 'double',
        'status' => TaskStatusEnum::class,
    ];

    /**
     * Get the project that owns the task.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user that owns the task.
     */
    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    /**
     * Get the user that is assigned to the task.
     */
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    /**
     * Get tracking for the task by current user.
     */
    public function tracking()
    {
        return $this->hasOne(Tracking::class);
    }

    /**
     * Get all trackings for the task.
     */
    public function trackings()
    {
        return $this->hasMany(Tracking::class)->withoutGlobalScope(UserTrackingScope::class);
    }

    /**
     * Get all trackings for the task.
     */
    public function trackingsByUser()
    {
        return $this->hasMany(Tracking::class);
    }

    /**
     * Get the tracking for the task.
     */
    public function openTracking()
    {
        return $this->hasOne(Tracking::class)
            ->whereNull('end_at');
    }

    /**
     * Get the trackings for the task.
     */
    public function openTrackings()
    {
        return $this->hasMany(Tracking::class)
            ->whereNull('end_at');
    }

    /**
     * Get the tracking for the task.
     */
    public function finishedTracking()
    {
        return $this->hasOne(Tracking::class)
            ->whereNotNull('end_at');
    }

    /**
     * Get the finished trackings for the task.
     */
    public function finishedTrackings()
    {
        return $this->hasMany(Tracking::class)
            ->whereNotNull('end_at');
    }

    /**
     * Get the total time spent on the task.
     */
    public function timeSpent()
    {
        return $this->finishedTrackings()->withoutGlobalScope(UserTrackingScope::class)->get()->sum('duration');
    }

    public function timeSpentByUser()
    {
        return $this->finishedTrackings()->get()->sum('duration');
    }

    /**
     * Scope a query to only include open tasks from the current user.
     */
    public function scopeOpenTasksFromCurrentUser($query)
    {
        return $query->where('status', '!=', TaskStatusEnum::Done)->where('status', '!=', TaskStatusEnum::Cancelled)->where('assigned_user_id', auth()->user()->id);
    }

    /**
     * Scope a query to only include open tasks from the current user.
     */
    public function scopeOpenTasks($query) {
        return $query->where('status', '!=', TaskStatusEnum::Done)->where('status', '!=', TaskStatusEnum::Cancelled);
    }

    /**
     * Scope a query to only include open tasks from the current user.
     */
    public function scopeFinishedTasks($query)
    {
        return $query->where('status', '=', TaskStatusEnum::Done)->orWhere('status', '=', TaskStatusEnum::Cancelled);
    }

    /**
     * Scope a query to only include open tasks from the current user.
     */
    public function scopeFinishedTasksFromCurrentUser($query) {
        return $query->where('status', '=', TaskStatusEnum::Done)->orWhere('status', '=', TaskStatusEnum::Cancelled)->where('assigned_user_id', auth()->user()->id);
    }
}
