[Back to the Ling/Light_Flasher api](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher.md)<br>
[Back to the Ling\Light_Flasher\Service\LightFlasher class](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher.md)


LightFlasher::getFlash
================



LightFlasher::getFlash — Returns the flash (notification) associated with the given $id, or false if no flash was bound to that $id.




Description
================


public [LightFlasher::getFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher/getFlash.md)(string $id) : array | false




Returns the flash (notification) associated with the given $id, or false if no flash was bound to that $id.
If the flash exists, it will also be removed from the session.




Parameters
================


- id

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [LightFlasher::getFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/Service/LightFlasher.php#L129-L138)


See Also
================

The [LightFlasher](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher.md) class.

Previous method: [hasFlash](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher/hasFlash.md)<br>Next method: [startPhpSession](https://github.com/lingtalfi/Light_Flasher/blob/master/doc/api/Ling/Light_Flasher/Service/LightFlasher/startPhpSession.md)<br>

