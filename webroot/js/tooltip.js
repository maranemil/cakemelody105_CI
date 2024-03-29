//////////////////////////////////////////////////////////////////
// qTip - CSS Tool Tips - by Craig Erskine
// http://qrayg.com | http://solardreamstudios.com
//
// Inspired by code from Travis Beckham
// http://www.squidfingers.com | http://www.podlob.com
//////////////////////////////////////////////////////////////////


const qTipTag = "a"; //Which tag do you want to qTip-ize? Keep it lowercase!//
const qTipX = 0; //This is qTip's X offset//
const qTipY = -100; //This is qTip's Y offset//


//There's No need to edit anything below this line//
tooltip = {
    name: "qTip",
    offsetX: qTipX,
    offsetY: qTipY,
    tip: null
}

tooltip.init = function () {
    const tipContainerID = "qTip";
    const tipNameSpaceURI = "http://www.w3.org/1999/xhtml";
    if (!tipContainerID) {
    }
    let tipContainer = document.getElementById(tipContainerID);

    if (!tipContainer) {
        tipContainer = document.createElementNS ? document.createElementNS(tipNameSpaceURI, "div") : document.createElement("div");
        tipContainer.setAttribute("id", tipContainerID);
        document.getElementsByTagName("body").item(0).appendChild(tipContainer);
    }

    if (!document.getElementById) return;
    this.tip = document.getElementById(this.name);
    //if (this.tip) document.onmousemove = function (evt) {tooltip.move (evt)};
    if (this.tip) {

        // get position of ratingblock
        this.rb = document.getElementById('ratingblock');
        let rbleft = rbtop = 0;
        rbheight = this.rb.offsetHeight;
        if (this.rb.offsetParent) {
            rbleft = this.rb.offsetLeft
            rbtop = this.rb.offsetTop
            while (this.rb === this.rb.offsetParent) {
                rbleft += this.rb.offsetLeft
                rbtop += this.rb.offsetTop
            }
        }

        // anchor the tooltip instead of having it follow the mouse
        this.tip.style.left = rbleft + "px";
        this.tip.style.top = (rbtop - (rbheight / 2.5)) + "px";
    }

    let a, sTitle;
    const anchors = document.getElementsByTagName(qTipTag);

    for (let i = 0; i < anchors.length; i++) {
        a = anchors[i];
        sTitle = a.getAttribute("title");
        if (sTitle) {
            a.setAttribute("tiptitle", sTitle);
            a.removeAttribute("title");
            a.onmouseover = function () {
                tooltip.show(this.getAttribute('tiptitle'))
            };
            a.onmouseout = function () {
                tooltip.hide()
            };

            /* added mousedown to hide because rating script 
             * uses an ajax update to non-linked images, 
             * which would leave the tooltip on the screen
             * (because no mouseout event happened)
             */

            a.onmousedown = function () {
                tooltip.hide()
            };
        }
    }
}

tooltip.move = function (evt) {
    let x = 0, y = 0;
    if (document.all) {//IE
        x = (document.documentElement && document.documentElement.scrollLeft) ? document.documentElement.scrollLeft : document.body.scrollLeft;
        y = (document.documentElement && document.documentElement.scrollTop) ? document.documentElement.scrollTop : document.body.scrollTop;
        x += window.event.clientX;
        y += window.event.clientY;

    } else {//Good Browsers
        x = evt.pageX;
        y = evt.pageY;
    }
    this.tip.style.left = (x + this.offsetX) + "px";
    this.tip.style.top = (y + this.offsetY) + "px";

}

tooltip.show = function (text) {
    if (!this.tip) return;
    this.tip.innerHTML = text;
    this.tip.style.display = "block";
}

tooltip.hide = function () {
    if (!this.tip) return;
    this.tip.innerHTML = "";
    this.tip.style.display = "none";
}

window.onload = function () {
    tooltip.init();
}

