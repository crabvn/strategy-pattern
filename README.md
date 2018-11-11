# strategy-pattern
https://viblo.asia/p/tim-hieu-strategy-pattern-znmMdy7YGr69

# Regarding to the topic, there is one question that asked:
Can you give a real case that we will use this pattern?

Okay: let imagine that you have a User class, user has there own update method which is the same for all user. But one day, your customer wants the annual user will be received an email with updated info. Okay, you may be change the update function in the logic. If that is annual user, send them email. Looks still good? But what if your customer wants that the annual user who haven't activated for four months will be received notification in sms not email when they active and update there info again? 

Wow, let's add another condition into the update logic. But these things happen all the time, right? you won't know when the customer change the requirements.

Clearly that the **update function** is changed frequency, so you might be want to move the behavior after the update method into another Class which is call `AfterUpdateBehavior` and then `MailingAfterUpdateBehavior` and then `SmsAfterUpdateBehavior`.

Then you will be able to do
`$this->user->setBehaviorAfterUpdate()` by using `MailingAfterUpdateBehavior` or `SmsAfterUpdateBehavior`
Then $this->user->notifyAfterUpdate()

This is my understanding. Thanks for contributing.