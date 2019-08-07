<?php


namespace Ling\Light_Flasher\Service;


/**
 * The LightFlasher class.
 *
 * The idea of a flasher is to store a message in the session, display it on the next page, and remove it from the session
 * as soon as it has been displayed.
 *
 *
 * A concrete use case
 * ---------
 * Them most popular case case where a flasher might be useful is probably the case of a form with redirection.
 * Imagine a form, and for some reason when the form is successful you want to redirect to the user to the same page.
 *
 * Why? Because this way you avoid the problem of: "what happens if the user refreshes the page again, will it post the data again".
 *
 * So, your form, if successful, redirects the user on the same page.
 * The only problem with this technique is that now: how do you display the congrats message to the user?
 *
 * That's where a flasher shines.
 * Basically, just before redirecting, you add a flash (this will add a message in the session).
 * And after the redirect, you convert any existing flash into a form notification.
 * That's it, in a nutshell.
 *
 *
 * Identifiers
 * -------
 * Now because there could be multiple flashes uses per page (who knows), this flash system uses an id key.
 * In other words, each message is bound to an id, and to retrieve the message one must provide the corresponding id.
 * That's all.
 *
 *
 *
 *
 *
 */
class LightFlasher
{
    /**
     * This property holds the sessionName for this instance.
     * @var string = light_flasher
     */
    protected $sessionName;

    /**
     * This property holds the flashes for this instance.
     * It's an array of id => flash message.
     *
     *
     * @var array
     */
    protected $flashes;


    /**
     * Builds the LightFlasher instance.
     */
    public function __construct()
    {
        $this->sessionName = "light_flasher";
        $this->flashes = [];
    }


    /**
     * Adds a flash to the flasher.
     *
     *
     * @param string $id
     * The flash identifier.
     *
     * @param string $message
     * The flash message.
     */
    public function addFlash(string $id, string $message)
    {
        $this->startPhpSession();
        $_SESSION[$this->sessionName][$id] = $message;
    }


    /**
     * Returns whether the given $id is bound to a flash at the moment.
     *
     * @param string $id
     * @return bool
     */
    public function hasFlash(string $id): bool
    {
        $this->startPhpSession();
        return array_key_exists($id, $_SESSION[$this->sessionName]);
    }


    /**
     * Returns the flash associated with the given $id, or false if no flash was bound to that $id.
     * If the flash exists, it will also be removed from the session.
     *
     * @param string $id
     * @return string|false
     */
    public function getFlash(string $id)
    {
        $this->startPhpSession();
        if (array_key_exists($id, $_SESSION[$this->sessionName])) {
            $ret = $_SESSION[$this->sessionName][$id];
            unset($_SESSION[$this->sessionName][$id]);
            return $ret;
        }
        return false;
    }




    //--------------------------------------------
    //
    //--------------------------------------------
    //--------------------------------------------
    //
    //--------------------------------------------
    /**
     * Starts the php session if it's not already started.
     * @return void
     */
    private function startPhpSession()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (false === array_key_exists($this->sessionName, $_SESSION)) {
            $_SESSION[$this->sessionName] = [];
        }
    }
}