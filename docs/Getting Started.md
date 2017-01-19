# Getting Started
## Creating instance
Use this code to create your SteamPHP instance:

```php
include_once 'steamphp.php';

$key = "insert your api key here";
$steamID = "insert steamID here";

$steamphp = new SteamPHP($key, $steamID); //SteamID is optional.
```

## __construct Usage

### Input

**newKey** - Your SteamAPI key. - **Required**

**newSteamID** - If you are going to use one SteamID in that instance, set this variable to that SteamID. - *Optional*

### Output

Nothing.