var Storage = window.localStorage;//// ref="storage"
//var Storage = window.sessionStorage;//// ref="storage2"
window.onload = function(){//// ref="init1"
  var Canvas = document.getElementById("Canvas");
  var C1 = document.getElementById("color1");
  var C2 = document.getElementById("color2");
  var Paths = new Array(6).fill(1).map(function() {//// ref="Array.fill"
    return MKSVGElm(Canvas, "path", {"stroke-width": 6, "fill": "none"},{});
  });
  C1.value = Storage.C1?Storage.C1:"red";//// ref="setFromStorage1"
  C2.value = Storage.C2?Storage.C2:"green";//// ref="setFromStorage2"
  document.getElementById("SetColor").addEventListener("click", DrawFigs, true);
  DrawFigs();//// ref="init2"
  function DrawFigs() {//// ref="DrawFigsS"
    var W1=8, W2=4;
    var Color1 = C1.value;  //// ref="saveFromStorage1"
    var Color2 = C2.value;  //// ref="saveFromStorage2"
    Storage.C1 = Color1;
    Storage.C2 = Color2;
    [[150, 30, W1, W2, Color1], [144, 30, W1, W2, Color2],//// ref="forEachS"
     [80, 20, W1, W2, Color1],  [86.5, 20, W1, W2, Color2],
     [14, 20, 0, 0, Color1],    [10, 20, 0, 0, Color2]].forEach(//// ref="forEachE"
      function(Param, No) {
        var R=Param[0], sR = Param[1], W = Param[2],//// ref="paramSetS"
            W2 = Param[3], Color = Param[4];        //// ref="paramSetE"
        var d = "M", i, Ang, R0;
        for(i=0;i<720;i++) {
          Ang= Math.PI*i/180/2;
          R0=R+sR*(Math.cos(W*Ang)*Math.cos(W2*Ang));//// ref="dist"
          d += R0*Math.cos(Ang) + ","+R0*Math.sin(Ang)+" ";//// ref="pos"
        }
        SetAttributes(Paths[No], {"d": d+"z", "stroke": Color});
     })//// ref="DrawFigureE"
  }
}