var money;
var name;
var gameMoney;
var Country_Name=["ETHIOPIA","KENYA"];
var lives=5;
var numbers = /^[0-9]+$/;
var sr = Math.floor(Math.random() * 2);
var tempCountry= Country_Name[sr];
var countryGuess= tempCountry.replace(/\S/gi, '*');


function textVisible(){
  name= document.getElementById("nameInput").value;
  money=document.getElementById("depositInput").value;

  if((name.trim()!='')&&(money.trim()!='')){
    if(money.match(numbers)){
      document.getElementById("name").innerHTML=name;
      document.getElementById("content").style.display="inline";
      document.getElementById("playMoney").style.display="inline";

      document.getElementById("firstForm").style.display="none";
    }


  }


}
function acceptMoney(){
  gameMoney=document.getElementById("gameMoney").value;
  if(gameMoney.match(numbers)){
    if (gameMoney<=money){
      document.getElementById("content").style.display="none";
      document.getElementById("playMoney").style.display="none";

      document.getElementById("game").style.display="block";

      document.getElementById('totalDeposit').innerHTML=money;
      document.getElementById('cuurrentDeposit').innerHTML=gameMoney;
    }
  }



}
function playGame(){
  var guessWord= document.getElementById("guess").value;


  if(tempCountry==countryGuess){
    document.getElementById("status").innerHTML="Congrats you got the word. You have won "+ gameMoney*10+" birr";
    document.getElementById("guess").style.display="none";
    document.getElementById("guessButton").style.display="none";

  }


  else if(lives>1){

    if((tempCountry.includes(guessWord.toUpperCase()))== true){
      var n=getlocation(guessWord.toUpperCase(),tempCountry);
      var i;

      for(i=0; i<n.length; i++){
        countryGuess=setCharAt(countryGuess,n[i],guessWord.toUpperCase());

      }


      document.getElementById("status").innerHTML="You have found a letter you have "+lives+" lives left. "+countryGuess;


      if(tempCountry==countryGuess){
        document.getElementById("status").innerHTML="Congrats you got the word. You have won "+ gameMoney*10+" birr";
        document.getElementById("guess").style.display="none";
        document.getElementById("guessButton").style.display="none";
        document.getElementById("clickHere").style.display="inline";

      }
    }


    else{
      lives--;
      document.getElementById("status").innerHTML="You didnt guess right. you have  "+lives+" lives left. "+countryGuess;
    }


  }
  else {
    document.getElementById("status").innerHTML="Sorry you have used up all your chances. Your word was "+ tempCountry+". You have lost "+ gameMoney+" birr";
    document.getElementById("guess").style.display="none";
    document.getElementById("guessButton").style.display="none";
    document.getElementById("clickHere").style.display="inline";

  }

}
function setCharAt(str,index,chr) {
if(index > str.length-1) return str;
return str.substr(0,index) + chr + str.substr(index+1);
}
function getlocation(substring,string){
var locations=[],i=-1;
while((i=string.indexOf(substring,i+1)) >= 0) locations.push(i);
return locations;
}
