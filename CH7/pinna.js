let Canvas, C1, C2, Paths =[];
window.onload = function(){//// ref="init1"
  Canvas = document.getElementById("Canvas");
  C1 = document.getElementById("color1");//// ref="getElm1"
  C2 = document.getElementById("color2");//// ref="getElm2"
  for(let i= 0; i<6;i++) {//// ref="createPathsS"
    Paths[i] = MKSVGElm(Canvas, "path", {"stroke-width": 6, "fill": "none"},{});
  }//// ref="createPathsE"
  C1.value = "red";//// ref="setInitialVal1"
  C2.value = "green";//// ref="setInitialVal2"
  document.getElementById("SetColor").addEventListener("click", DrawFigs, true);//// ref="addEvent"
  DrawFigs();//// ref="draw"
}//// ref="init2"
function DrawFigs() {//// ref="DrawFigsS"
  let W1=8, W2=4;
  let Color1 = C1.value;  
  let Color2 = C2.value;  
  DrawFigure(150, 30, W1, W2, Color1, 0);//// ref="DrawFig1"
  DrawFigure(144, 30, W1, W2, Color2, 1);
  DrawFigure(80, 20, W1, W2, Color1, 2);
  DrawFigure(86.5, 20, W1, W2, Color2, 3);
  DrawFigure(14, 20, 0, 0, Color1, 4);
  DrawFigure(10, 20, 0, 0, Color2, 5);//// ref="DrawFig2"
}//// ref="DrawFigsE"
function DrawFigure(R, sR, W, W2, Color, No) {//// ref="DrawFigureS"
  let d = "M", i, Ang, R0;
  for(i=0;i<720;i++) {
    Ang= Math.PI*i/180/2;
    R0=R+sR*(Math.cos(W*Ang)*Math.cos(W2*Ang));//// ref="dist"
    d += R0*Math.cos(Ang) + ","+R0*Math.sin(Ang)+" ";//// ref="pos"
  }
  SetAttributes(Paths[No], {"d": d+"z", "stroke": Color});//// ref="setFig"
}//// ref="DrawFigureE"
