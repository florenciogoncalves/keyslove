document.querySelector("body").style.height =
  document.documentElement.clientHeight + "px";

let addEvent = function (elem, type, eventHandle) {
  if (elem == null || typeof elem == "undefined") return;
  if (elem.addEventListener) {
    elem.addEventListener(type, eventHandle, false);
  } else if (elem.attachEvent) {
    elem.attachEvent("on" + type, eventHandle);
  } else {
    elem["on" + type] = eventHandle;
  }
};

addEvent(window, "resize", function () {
  document.querySelector("body").style.height =
    document.documentElement.clientHeight + "px";
    document.querySelector("body").style.maxHeight =
    document.documentElement.clientHeight + "px";
    document.querySelector("body").style.width =
    document.documentElement.clientWidth + "px";
  document.querySelector("body").style.maxWidth =
    document.documentElement.clientWidth + "px";
});

