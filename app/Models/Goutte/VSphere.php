<?php

namespace App\Models\Goutte;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Goutte\Client;

class VSphere extends Model
{
    use HasFactory;
    private $vSphereUsername = 'Administrator@vsphere.local';
    private $vSpherePassword = 'Password123!';
    private $vSphereLoginPageURL = 'https://vpi6065.pie.lab.emc.com/websso/SAML2/SSO/vsphere.local?SAMLRequest=zVTJbtswEL33KwTeJcqM7ThE5MCNGzRAFjdyi6KXgqJGMQGJVDmU5Px9KdlujaBZjr0Sbx7fMuT5%0AxbYqgxYsKqMTMopiEoCWJlf6MSFf11fhjFzMP5yjqMqaLxq30Q%2FwqwF0wQIRrPNjl0ZjU4FNwbZK%0AwrXOYZsQT7T0MKWFG6g3ztXIKW1rNY2nk6hWEJUii6CSkTQV7SBDNDRd3N4wmqb3tMV6A9aDjBQl%0ACa6MlTAISEghSgQSXC8T8hOKM4DJ5HSciWImi6lk7DQ7O2OnkzwrMmAehiuBqFr4O4jYeJ3ohHYJ%0AYTEbhfEkHJ2s4ylnMx5Po9lo%2BoMEK2uckab8qPQukMZqbgQq5FpUgNxJ3gvmLIp5tgMh%2F7xer8LV%0AfboeCFqVg73z6IS8YJ2Pxyck%2BHbogPUd%2BFY08iH112%2Bt9xLJfN%2FR4M2%2Bn0AcaiTztypqFO0JD1VV%0A4EQunDinxzfvdLCa956vlytTKvkULMrSdJcWhPM5ONvAUGgl3Ovi%2BhOVh8UA5XUfETrQjgTpquf%2F%0A0ohSFQrs2%2Fv1gvjjqNl7s6Z7k9yvfq768PCY5t2BP2fZk7R%2BZGeo91N1wr%2BC3gLKDVQCqXDOhgMx%0AZfGI0XhMP219LP3%2B4MHQFtUfjq7rou4kMvbRD8Qj%2Bv32Jh24QjU8Aunr8Hjunup%2BTXvFD6ChE1kJ%0Aa3%2F2D8P%2FkdQllPB4LJU%2BL2d%2BWNHjD2z%2BGw%3D%3D&SigAlg=http%3A%2F%2Fwww.w3.org%2F2001%2F04%2Fxmldsig-more%23rsa-sha256&Signature=GinHd3maWx%2FGFfq65ELgfJiCc9AWuOkEk5ya9o8ABKvYuqjzL4CUpRI8zpnx%2FokDJVoG4yn4Nwje%0A6Jg5p3aMbvnr7yR1giPnvU01avAgPeivQ8MFfED234tlllWbGlh8mpWj1krx15FTsqOPwiBRqzhW%0AZdC%2BXNabfaXj6dqAWwTf9lSbhQu6dd9ZG4L%2BtKGTaWuDOlKyb21oYuarGLOmzJCxWw6fAgztIzW8%0A%2FZxjuxuMUYYvIOOPMpLpNt9su%2F09mDks53Wb%2F%2FUL0E0dkGH%2BJHvxiWNE%2B53NHAjD%2FzbchMiLBKGq%0AsZv6S9LRm7BooVPaPQHTI8cQ0yKsEGmoy%2Fb02A%3D%3D';
    public function login(Client $client) {
        $client->followRedirects(true);
        $client->setMaxRedirects(200);
        $crawler = $client->request('GET', $this->vSphereLoginPageURL);
        // return $crawler->html();
        $form = $crawler->selectLink('submit')->form();
        return $form->getValues();
        return $client->submit($form, array('username' => $this->vSphereUsername, 'password' => $this->vSpherePassword));
    }
}
