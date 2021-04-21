<?php

class Task
{
    public const STATUS_NEW = 'new'; // default status
    public const STATUS_CANCELED = 'canceled';
    public const STATUS_IN_PROGRESS = 'in progress';
    public const STATUS_DONE = 'done';
    public const STATUS_FAILED = 'failed';
    public const STATUS_EXPIRED = 'expired';

    private const STATUSES_ARRAY = [
        self::STATUS_NEW,
        self::STATUS_CANCELED,
        self::STATUS_IN_PROGRESS,
        self::STATUS_DONE,
        self::STATUS_FAILED
    ];

    public $customerID;
    public $executorID;
    public $currentStatus;

    // Actions
    // For Customer
    public const ACTION_CANCEL = 'cancel';
    public const ACTION_COMPLETE = 'complete';
    // For Executor
    public const ACTION_RESPOND = 'respond';
    public const ACTION_FAIL = 'fail';

    //  Array of all actions
    private const ACTIONS_ARRAY = [
        self::ACTION_CANCEL,
        self::ACTION_COMPLETE,
        self::ACTION_RESPOND,
        self::ACTION_FAIL
    ];

    //
    private const ACTION_STATUS_MAP = [
        self::ACTION_CANCEL => self::STATUS_CANCELED,
        self::ACTION_COMPLETE => self::STATUS_DONE,
        self::ACTION_FAIL => self::STATUS_FAILED,
    ];

    private const STATUS_ACTION_MAP = [
        self::STATUS_NEW => [self::ACTION_CANCEL, self::ACTION_RESPOND],
        self::STATUS_IN_PROGRESS => [self::ACTION_COMPLETE, self::ACTION_FAIL],
    ];

   public function __construct (int $customerID, int $executorID, string $currentStatus)
   {
       $this->customerID = $customerID;
       $this->executorID = $executorID;
       $this->currentStatus = $currentStatus;
   }

    public function getStatusByAction(string $action): ?string
    {
        return ACTION_STATUS_MAP[$action] ?? null;
    }

    public function getAvailableActions (): ?string
    {
        return STATUS_ACTION_MAP[$this->currentStatus] ?? null;
    }

}
