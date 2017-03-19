window.onload = function() {//// ref="initS"
  var Data = [//// ref="dataS"
   ["あか","赤","red"],     ["くろ","黒","black"],
   ["みどり","緑","green"], ["あお","青","blue"],
   ["きいろ","黄","yellow"],["むらさき","紫","violet"]
  ];//// ref="dataE"
  var Type = 0;//// ref="paramType"
  var xUnit = 100, xInit = 70, xMax = 6;//// ref="paramX"
  var yUnit =  50, yInit = 20, yMax = 8;//// ref="paramY"
  var Max = 10, k, Doc, textNode;//// ref="Globals"
    var CColorName, Sols, Clicked;
  var SVG = document.getElementById("SVG");
  SetAttributes(SVG, {width:xUnit*xMax+xInit*2, height:yUnit*yMax+xInit*2});
  var Buttons = document.getElementById("Buttons");
  var ButtonList = Data.map(function(D) {
      var DIV = MKHTMLElm(Buttons, "div", {},{});
      return MKHTMLElm(DIV, "input", {type:"button", value:D[Type], disabled:"disabled"},{});
  });
  Doc = document.getElementById("Doc");//// ref="initDoc"
  var Start = document.getElementById("Start");
  Start.addEventListener("click", function() {
    k = Max;//// ref="initK"
    SetAttributes(Start,{disabled:"disabled"});
    ButtonList.forEach(function(B) {
      B.removeAttribute("disabled");
    });
      Sols = 0;
      Buttons.addEventListener("click", function(E){
          if(!Clicked) {
              if(E.target.value === CColorName) Sols++;
              Clicked = true;
          }
    },true);
    ShowProb();//// ref="Callfunction"
  },true);
  function ShowProb() {//// ref="ShowProbS"
    var x, y, i, j;
    Clicked = false;
    if(k>0) {//// ref="Checkend"
      i = getRand(0, Data.length);//// ref="setParami"
      j = getRand(0, Data.length);//// ref="setParamj"
      x = xInit + xUnit * getRand(0, xMax);//// ref="setParamPos3"
      y = yInit + yUnit * getRand(0, yMax);//// ref="setParamPos4"
      CColorName = Data[i][Type];
      if( Doc.firstChild) {//// ref="checkFirsttimeS"
        SetAttributes(textNode,{"x": x, "y": y,"fill":Data[i][2]});//// ref="changeAtribS"
        textNode.replaceChild(document.createTextNode(Data[j][Type]),//// ref="changeTextS"
           textNode.firstChild);//// ref="changeTextE"
      } else {
        textNode = MKSVGElm(Doc,"text",//// ref="createTextNodeS"
           {"x": x, "y": y,"class": "textstyle","fill":Data[i][2],stroke:"black"},{});//// ref="createTextNodeE"
      textNode.appendChild(document.createTextNode(Data[j][Type]));//// ref="createText"
      }//// ref="checkFirsttimeS"
      k--;//// ref="setNext"
      window.setTimeout(ShowProb,1000);//// ref="callNext"
    } else {
      ButtonList.forEach(function(B) {
        SetAttributes(B, {disabled:"disabled"});
      });
      Start.removeAttribute("disabled");
      alert("正解数:" + Sols);
    }
  }//// ref="ShowProbE"
}//// ref="initE"

function getRand(min, max) {//// ref="makeRandS"
  return Math.floor(min+(max-min)*Math.random());
}//// ref="makeRandE"
