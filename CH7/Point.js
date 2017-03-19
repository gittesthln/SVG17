function Point(PFig, PText, cx, cy, fill, r) {
  var TR, TD;
  Point.prototype.No++;
  this.ID = Point.prototype.No;
  this.x = cx;
  this.y = cy;
  this.Circle = MKSVGElm(PFig, 
      "circle", {"cx": cx, "cy": cy, "fill": fill, "r": r, "id":this.ID}, {});
  TR = MKHTMLElm(PText, "div",{"class":"Row"},{});
  TD = MKHTMLElm(TR, 
      "div", {"class":"Cell", "style": "color:"+ fill,"align":"center"},{});
  TD.appendChild(document.createTextNode("P"+this.ID));
  TD = MKHTMLElm(TR, "div",{"class":"Cell"},{});
  this.xText = MKHTMLElm(TD, "input", {"type": "text", "size":"3"},{});
  TD = MKHTMLElm(TR, "div",{"class":"Cell"},{});
  this.yText = MKHTMLElm(TD, "input", {"type": "text", "size":"3"},{});
  this.update();
}
Point.prototype.No = 0;
Point.prototype.setPos = function() {
  this.x = parseInt(this.xText.value);
  this.y = parseInt(this.yText.value);
  this.update();
}
Point.prototype.movePos = function(xx, yy) {
  this.x = xx;
  this.y = yy;
  this.update();
}
Point.prototype.update = function() {
  this.xText.value = this.x;
  this.yText.value = this.y;
  SetAttributes(this.Circle,{"cx":this.x, "cy": this.y});
}
Point.prototype.toSt = function() {
  return this.x+","+this.y+" ";
}
