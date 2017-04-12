let httpObj;
function createXMLHTTPReq( func ) {//// ref="createXMLHTTPReqS"
  let xmlHttpObj = null;
  if(window.XMLHttpRequest) {//// ref="XMLHTTPReq"
    xmlHttpObj = new XMLHttpRequest();
  } else if(window.ActiveXObject ) {//// ref="ActiveXS"
    try {
      xmlHttpObj = new ActiveXObject("Msxml2.XMLHTTP");//IE6//// ref="IE6"
    } catch(e) {//// ref="excetionS"
      try {
        xmlHttpObj = new ActiveXObject("Microsoft.XMLHTTP");//IE5//// ref="IE5"
      } catch(e) {
        return null;//// ref="null"
      }
    }//// ref="excetionE"
  }//// ref="ActiveXE"
  if(xmlHttpObj) xmlHttpObj.onreadystatechange = func;//// ref="setCallback"
  return xmlHttpObj;
}//// ref="createXMLHTTPReqE"
function getData() {//// ref="OpenS"
  httpObj = createXMLHTTPReq(displayPolygon);//// ref="MakeObj"
  if(httpObj) {//// ref="Succeed"
    httpObj.open("GET","./svg-polygon-ajax.php?N=" +//// ref="MakeReqS"
      encodeURI( document.getElementById("N").value),true);//// ref="MakeReqE"
    httpObj.send(null);//// ref="sendnull"
  } 
}//// ref="OpenE"
function displayPolygon() {//// ref="GetS"
    let polygon;
  if(httpObj.readyState == 4 && httpObj.status == 200) {//// ref="requestOK"
    alert(httpObj.responseText);//// ref="showSendText"
    polygon = document.getElementById("npolygon");//// ref="setDS"
    polygon.setAttribute("points", httpObj.responseText);//// ref="setDE"
  }
}//// ref="GetE"
