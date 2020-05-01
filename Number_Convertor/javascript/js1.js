
var th = ['','thousand','million', 'billion','trillion'];
var dg = ['zero','one','two','three','four', 'five','six','seven','eight','nine'];
var tn = ['ten','eleven','twelve','thirteen', 'fourteen','fifteen','sixteen', 'seventeen','eighteen','nineteen'];
var tw = ['twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];


var ah = ['','ሺህ','ሚሊዮን', 'ቢሊዮን','ትሪሊዮን'];
var ag = ['ዜሮ','አንድ','ሁለት','ሶስት','አራት', 'አምስት','ስድስት','ሰባት','ስምንት','ዘጠኝ'];
var an = ['አስር','አስራ አንድ','አስራ ሁለት','አስራ ሶስት', 'አስራ አራት','አስራ አምስት','አስራ ስድስት', 'አስራ ሰባት','አስራ ስምንት','አስራ ዘጠኝ'];
var aw = ['ሃያ','ሰላሳ','አርባ','ሃምሳ', 'ስልሳ','ሰባ','ሰማንያ','ዘጠና'];

  

function toAmharic(){
  var s= document.getElementById('input').value
  s = s.toString();
  s = s.replace(/[\, ]/g,'');
  if (s != parseFloat(s)) return 'not a number';
  var x = s.indexOf('.');
  if (x == -1)
      x = s.length;
  if (x > 15)
      return 'too big';
  // if((x[0])==0)
  //     document.getElementById("conversion").innerHTML = str."zero";
  var n = s.split('');
  var str = '';
  var negative=false;
  var sk = 0;

  if(n[0]=="-"){
    str="ኔጋቲቭ ";
    n.splice(0,1);
    x--;
    negative=true;
  }
  

  for (var i=0;   i < x;  i++) {

      if ((x-i)%3==2) {
          if (n[i] == '1') {
              str += an[Number(n[i+1])] + ' ';
              i++;
              sk=1;
          }
         else if (n[i]!=0) {
              str += aw[n[i]-2] + ' ';
              sk=1;
          }
      }
      else if (n[i]!=0) { // 0235
          str += ag[n[i]] +' ';
          if ((x-i)%3==0) str += 'መቶ ';
          sk=1;
      }
      if ((x-i)%3==1) {
          if (sk)
              str += ah[(x-i-1)/3] + ' ';
          sk=0;
      }
  }

  if(!negative){

    if (x != s.length) {
        var y = s.length;
        str += 'ነጥብ ';
        for (var i=x+1; i<y; i++)
            str += ag[n[i]] +' ';
    }

  }

  if(negative){
    if (x != (s.length-1)) {
        var y = s.length-1;
        str += 'ነጥብ ';
        for (var i=x+1; i<y; i++)
            str += ag[n[i]] +' ';
    }
  }



  document.getElementById('conversion').innerHTML=str.replace(/\s+/g,' ');
}



function toEnglish() {
  var s= document.getElementById('input').value
  s = s.toString();
  s = s.replace(/[\, ]/g,'');
  if (s != parseFloat(s)) return 'not a number';
  var x = s.indexOf('.');
  if (x == -1)
      x = s.length;
  if (x > 15)
      return 'too big';
  var n = s.split('');
  var str = '';
  var negative=false;
  var sk = 0;

  if(n[0]=="-"){
    str="negative ";
    n.splice(0,1);
    x--;
    negative=true;
  }

  for (var i=0;   i < x;  i++) {
      if ((x-i)%3==2) {
          if (n[i] == '1') {
              str += tn[Number(n[i+1])] + ' ';
              i++;
              sk=1;
          } else if (n[i]!=0) {
              str += tw[n[i]-2] + ' ';
              sk=1;
          }
      } else if (n[i]!=0) { // 0235
          str += dg[n[i]] +' ';
          if ((x-i)%3==0) str += 'hundred ';
          sk=1;
      }
      if ((x-i)%3==1) {
          if (sk)
              str += th[(x-i-1)/3] + ' ';
          sk=0;
      }
  }

  if(!negative){

    if (x != s.length) {
        var y = s.length;
        str += 'point ';
        for (var i=x+1; i<y; i++)
            str += dg[n[i]] +' ';
    }

  }

  if(negative){
    if (x != (s.length-1)) {
        var y = s.length-1;
        str += 'point ';
        for (var i=x+1; i<y; i++)
            str += dg[n[i]] +' ';
    }
  }

  document.getElementById('conversion').innerHTML=str.replace(/\s+/g,' ');
}


function chooseLanguage(){

      if(document.getElementById("language").value=="Amharic"){
          toAmharic();
      }
      if(document.getElementById("language").value=="English"){
          toEnglish();
      }
  }