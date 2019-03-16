# Fantasy Football API

The API is used to create, read, update, delete teams in a fantasy football league. All expected output are in JSON.

## Read All

Use read.php and get the expected output of

```JSON
[
    {
        "id": "1",
        "name": "Jawad",
        "win": "2",
        "loss": "11",
        "championship": "0"
    },
    {
        "id": "2",
        "name": "Nick",
        "win": "11",
        "loss": "2",
        "championship": "2"
    },
    {
        "id": "3",
        "name": "Joe",
        "win": "6",
        "loss": "7",
        "championship": "1"
    },
    {
        "id": "4",
        "name": "James",
        "win": "12",
        "loss": "1",
        "championship": "1"
    },
    {
        "id": "5",
        "name": "Ryan",
        "win": "4",
        "loss": "9",
        "championship": "0"
    },
    {
        "id": "6",
        "name": "Kevin",
        "win": "12",
        "loss": "1",
        "championship": "1"
    },
    {
        "id": "7",
        "name": "Frank",
        "win": "7",
        "loss": "6",
        "championship": "0"
    },
    {
        "id": "8",
        "name": "Alex",
        "win": "10",
        "loss": "3",
        "championship": "0"
    }
]
```
## Read Team
To read one team use the url to type in read_team.php?id=TEAM_ID


## Creating Teams
You may leave the win, loss, championship blank and they will be set to 0. To create a team, use the example below
```JSON
{
	"name":"Alex"
}
```

## Updating Teams
To update a team just select what you want to update like the example below
```JSON
{
	"win":2
}
```

## Deleting Teams
To delete a team, use delete.php?id=TEAM_ID
