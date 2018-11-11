<?php

interface NotificationBehavior
{
    public function notify();
}

class DefaultNotification implements NotificationBehavior
{
    public function notify()
    {
        echo 'We just notified user by default method';
    }
}

class SmsNotification implements NotificationBehavior
{
    public function notify()
    {
        echo 'We sent sms to user';
    }
}

class MailingNotification implements NotificationBehavior
{
    public function notify()
    {
        echo 'We sent an email to user';
    }
}


class User
{
    private $notificationMethod;

    public function __construct()
    {
        $this->notificationMethod = new DefaultNotification();
    }

    public function setNotificationMethodAfterUpdate(NotificationBehavior $notification)
    {
        $this->notificationMethod = $notification;
    }

    public function notify()
    {
        $this->notificationMethod->notify();
    }
}

if (isset($_POST['frequency_form'])) {
    $frequency = $_POST['frequency_form'];
    $user = new User();

    switch ($frequency) {
        case 'Annual' :
            $user->setNotificationMethodAfterUpdate(new MailingNotification());
            break;
        case 'HaventActive':
            $user->setNotificationMethodAfterUpdate(new SmsNotification());
            break;
        default:
            break;
    }

    $user->notify();
}
?>

<hr>

<form method="post" action="/example.php" name="isset($_POST['frequency_form'])">
    <label for="">
        Choose your subscription type:
    </label>
    <input type="submit" value="Normal" name="frequency_form">
    <input type="submit" value="Annual" name="frequency_form">
    <input type="submit" value="HaventActive" name="frequency_form"">
</form>