<?php

namespace NotificationChannels\Fcm\Messages;

use NotificationChannels\Fcm\Notifications\FcmAndroidNotification;

class FcmAndroidMessage extends FcmMessage
{
    /**
     * @var FcmAndroidNotification
     */
    protected $notification;

    /**
     * {@inheritdoc}
     * @param FcmAndroidNotification $notification
     */
    public function setNotification($notification)
    {
        $this->notification = $notification;

        return $this;
    }

    /**
     * @return FcmAndroidNotification
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'to'               => $this->to,
            'registration_ids' => $this->registrationIds,
            'condition'        => $this->condition,
            'collapse_key'     => $this->collapseKey,
            'priority'         => $this->priority,
            'time_to_live'     => $this->timeToLive,
            'dry_run'          => $this->dryRun,
            'data'             => $this->data,
            'notification'     => $this->notification->toArray(),
        ];
    }
}
