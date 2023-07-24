# Accordion Task @ Imre Toth

## Installation 

### Method 1

The plugin in zip format upload to the wordpress instance

### Method 2

Copy the extracted content into wp-content/plugins and move the content in the folder accordion-task (the same name as the main file of the plugin accordion-task.php)

## Additional setup

In case bootstrap 5 is not installed, add in the header the cdn links

```
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
```

## How to use

### Backend part
1. In the setting section go to the newly added Accordion Settings
2. Delete the item you want by clicking the corresponding delete button of the item
3. Add any new item by adding the title and description (both required!) and clicking the add button
4. Save the changes! 

### Frontend part
Add the shortcode `[accordion_task]` to any page you want.

## Developer Notes

- I did not know which fonts are required and I chose the colors based on an online color picker tool
- I chose the opacity of the body of an item randomly based on what I saw it fit best from the image
- I did not have the plus image and did by myself an animation where the Y axis of + morphs into X axis forming a minus -
- I did not know exactly if there should be another field except title and description and the theme of the item changes based on it's modulo 4 since there are 4 colors

Thank you!