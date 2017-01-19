# ResolveVanityUrl
Turns a vanityURL into a Steam64 ID.

## Input

**vanityURL** - User's customURL ID. (example: http://steamcommunity.com/id/gabelogannewell = gabelogannewell) - **Required**

**remember** - Remembers result SteamID, like the constructor would.

## Output

The content outputs the user's SteamID, except:

Response wasn't JSON - **-1**

User not found - **-2**

Unknown error - **-3**

## Example
```php
include_once 'steamphp.php';

$key = "insert your api key here";
$vanityURL = "insert user's customurl id here";

$steamphp = new SteamPHP($key);

$steamID = $steamphp->ResolveVanityUrl($vanityURL, true); //remembers output
$steamID = $steamphp->ResolveVanityUrl($vanityURL, true); //doesn't remember output
```