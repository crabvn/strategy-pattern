# strategy pattern example php
https://viblo.asia/p/tim-hieu-strategy-pattern-znmMdy7YGr69

# Regarding to the topic, there is one question that asked:
Can you give a real case that we will use this pattern?

Okay: let's imagine that you have a User class, user has their own update method which is the same for all users. But one day, your customer wants the annual users will be received an email with updated info. Okay, you may change the update function in the logic. If that is annual user, send them email. Looks still good! 

But what if your customer keep changing the requirement? that the annual user who haven't activated for four months will be received notification in sms not email when they active and update there info again? 

Wow, let's add another condition into the update logic. But these things happen all the time, right? you won't know when the customer change the requirements.

Clearly that the **logic after update** is changed frequency, so you might be want to move the action after the update method into another Class which is call `NotificationBehavior` and then `MailingNotification` and then `SmsNotification`.

Then you will be able to do
`$this->user->setNotificationMethodAfterUpdate()` by using `MailingNotification` or `SmsNotification`
Then $this->user->notify()

This is my understanding. Thanks for contributing.