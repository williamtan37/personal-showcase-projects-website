var itemNum = 1;

function createNewItemLabel(num)
{
	var element = document.createElement("div");
	element.innerHTML = "Item #" + num + ":";
	return element;
}
function createNewItem(num)
{
	var element = document.createElement("input");
	element.setAttribute("type","text");
	element.required = true;
	element.setAttribute("name", "items[]");
	return element;
}

function addItemGroup()
{
	var elementLabel = createNewItemLabel(itemNum);
	var elementInput = createNewItem(itemNum);

	$("#add-item-button").before(elementLabel);
	$("#add-item-button").before(elementInput);
	$("#add-item-button").before("<br>");
	itemNum++;
}


addItemGroup();
document.getElementById("add-item-button").setAttribute("onclick", "addItemGroup()");