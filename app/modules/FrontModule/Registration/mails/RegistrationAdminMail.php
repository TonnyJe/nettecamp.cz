<?php declare(strict_types = 1);

namespace App\FrontModule\Mails;

use App\Model\Registration;
use Nette;
use Ublaboo\Mailing\AbstractMail;
use Ublaboo\Mailing\IComposableMail;
use Ublaboo\Mailing\IMessageData;

final class RegistrationAdminMail extends AbstractMail implements IComposableMail
{

    public function compose(Nette\Mail\Message $message, ?IMessageData $mailData): void
    {
        // make IComposableMail generic class
        assert($mailData instanceof Registration);  // Maybe interface???

        $message->setFrom($this->mailAddresses['default_sender']);
        $message->addReplyTo($mailData->email, $mailData->name);
        $message->addTo($this->mailAddresses['default_recipient']);
        $message->addCc($this->mailAddresses['copy_recipient']);
    }

}
