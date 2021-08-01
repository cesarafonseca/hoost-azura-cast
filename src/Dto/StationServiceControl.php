<?php
declare(strict_types=1);

namespace AzuraCast\Api\Dto;

class StationServiceControl
{
    /**
     * @var bool
     */
    protected $success;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $formattedMessage;

    /**
     * @param bool $success
     * @param string $message
     * @param string $formattedMessage
     */
    public function __construct(bool $success, string $message, string $formattedMessage)
    {
        $this->setSuccess($success)
            ->setMessage($message)
            ->setFormattedMessage($formattedMessage);
    }

    /**
     * @return bool
     */
    public function getSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @return StationServiceControl
     */
    public function setSuccess(bool $success): StationServiceControl
    {
        $this->success = $success;

        return $this;
    }

    /**
     * @return bool
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return StationServiceControl
     */
    public function setMessage(string $message): StationServiceControl
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return bool
     */
    public function getFormattedMessage(): string
    {
        return $this->formattedMessage;
    }

    /**
     * @return StationServiceControl
     */
    public function setFormattedMessage(string $formattedMessage): StationServiceControl
    {
        $this->formattedMessage = $formattedMessage;

        return $this;
    }

    /**
     * @param mixed[] $stationRestartData
     *
     * @return StationServiceControl
     */
    public static function fromArray(array $stationRestartData): self
    {
        return new self(
            $stationRestartData['success'],
            $stationRestartData['message'],
            $stationRestartData['formatted_message']
        );
    }
}
