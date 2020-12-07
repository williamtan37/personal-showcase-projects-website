"use strict";
var board; 
const ROWS = 4, COLS = 8;
const REFRESH_INTERVAL = 10;
const INITAL_SPAWN_INTERVAL = 1000, INITAL_EXPIRE_INTERVAL = 1700;
var timeCounter, currSpawnInterval, currExpireTime;
var score, life;
var intervalID;

class Mole{
	constructor(expireTime){
		this.expireTime =  expireTime;
	}
}

function createEmptyBoard()
{
	let result = [];
	for(let i = 0; i < ROWS; i++){
		let row = [];
		for(let j = 0; j < COLS; j++)
			row.push(null);
		result.push(row);
		row = [];
	}
	return result;
}

function newGameResetVariables()
{
	currSpawnInterval = INITAL_SPAWN_INTERVAL;
	currExpireTime = INITAL_EXPIRE_INTERVAL;
	timeCounter = 0;
	score = 0;
	life = 5;
	board = createEmptyBoard();
}

function handleStartButtonClick()
{
	$("#startButton").html("Started");
	$("#startButton").prop('disabled', true)
	newGameResetVariables();
	intervalID = setInterval(startGame,REFRESH_INTERVAL);
}

function increaseDifficulty(){

	if(currSpawnInterval > 300)
		currSpawnInterval -= Math.floor(Math.random() * 35);
	if(currExpireTime > 500)
		currExpireTime -= Math.floor(Math.random() * 18);
}

function startGame()
{
	timeCounter += 10;
	if(timeCounter >= currSpawnInterval){
		timeCounter = 0;
		spawnMole();
	}

	deleteExpiredMole();
	updateGraphics();

	if(life == 0)
		gameOver();
}

function spawnMole()
{
	let coord = findEmptySpot();
	let now = new Date();
	board[coord['row']][coord['col']] = new Mole(now.getTime() + currExpireTime);
}

function findEmptySpot()
{
	let row;
	let col;
	do{
		row = Math.floor(Math.random() * ROWS);
		col = Math.floor(Math.random() * COLS);
	}
	while(board[row][col] != null);

	return {'row': row, 'col': col};
}

function deleteExpiredMole()
{
	for(let i = 0; i < ROWS; i++){
		for(let j = 0; j < COLS; j++){
			let now = new Date();
			let curr = board[i][j];
			if(curr != null &&  now.getTime() > curr.expireTime){
				board[i][j] = null;
				life--;
				let parentSelector = "#" + i.toString() + j.toString();
				let redXId = i.toString() + j.toString() + "redX";

				$(parentSelector).removeAttr("onclick");
				$(parentSelector).append("<img id=" + redXId + " src='assets/redX.jpg' width='80px' height='80px'>");
				setTimeout(()=>{$("#"+redXId).remove()},160);
			}
		}
	}
}

function updateGraphics()
{
	$("#score").html(score);
	$("#life").html(life);

	for(var i = 0; i < ROWS; i++){
		for(let j = 0; j < COLS; j++){
			let curr = board[i][j];
			let eventSelector = "#" + i.toString() + j.toString();
			if(curr instanceof Mole){
				$(eventSelector).css("background-image", "url('/assets/mole.jpg')");
				$(eventSelector).css("background-size", "80px");
				$(eventSelector).attr("onclick", "userKilledMole(this);");
			}
			else
				$(eventSelector).css("background-image", "none");
		}
	}
}

function userKilledMole(event)
{
	board[event.id[0]][event.id[1]] = null;
	let eventSelector = "#" + event.id;  //Gives String position like "12" or "43"
 	$(eventSelector).removeAttr("onclick");
	score++;
	increaseDifficulty();

	let greenCheckId = event.id + "greenCheck";
	$(eventSelector).append("<img id=" + greenCheckId + " src='assets/greencheck.jpg' width='80px' height='80px'>");
	setTimeout(()=>{$("#"+greenCheckId).remove()},160);
}

function gameOver()
{
	clearInterval(intervalID);

	for(var i = 0; i < ROWS; i++){
		for(let j = 0; j < COLS; j++){
			let parentSelector = "#" + i.toString() + j.toString();
			$(parentSelector).removeAttr("onclick");
		}
	}
			
	$("#startButton").html("Game Over. Try Again?");
	$("#startButton").prop('disabled', false);
}

$('#startButton').attr("onclick", "handleStartButtonClick()");