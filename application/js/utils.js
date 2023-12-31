function showAndHidePass(checkBox, htmlInput) {
  if (checkBox) htmlInput.attr("type", "text");
  else htmlInput.attr("type", "password");
}
function showInfoOrErrorMessages(message, html, infoType = "success", timeout=4000) {
  
    html.html(
      `
<div class="alert ${infoType == "success" ? "alert-success" : "alert-danger"}">
<strong>${message}</strong>
</div>
`
    );
  setTimeout(() => {
    html.html("");
  }, timeout);
}

function displayToast(message, type, timeout) {
  if (type == "error") {
    iziToast.error({
      title: "Error Encountered! ",
      message: message,
      backgroundColor: "#D83A56",
      titleColor: "white",
      messageColor: "white",
      position: "topRight",
      timeout: timeout,
    });
  } else if (type == "success") {
    iziToast.success({
      message: message,
      backgroundColor: "#54B435",
      titleColor: "white",
      messageColor: "white",
      position: "topRight",
      timeout: timeout,
    });
  } else if (type == "ask") {
    iziToast.question({
      timeout: timeout,
      close: false,
      overlay: true,
      displayMode: "once",
      id: "question",
      zindex: 999,
      title: "Condirm!",
      message: message,
      position: "topRight",
      titleColor: "#86E5FF",
      messageColor: "white",
      backgroundColor: "#0081C9",
      iconColor: "white",
      buttons: [
        [
          '<button style="background: #DC3535; color: white;"><b>YES</b></button>',
          function (instance, toast) {
            alert("Ok Deleted...");
            instance.hide(
              {
                transitionOut: "fadeOut",
              },
              toast,
              "button"
            );
          },
          true,
        ],
        [
          '<button style="background: #ECECEC; color: #2b2b2b;">NO</button>',
          function (instance, toast) {
            alert("Retuned");
            instance.hide(
              {
                transitionOut: "fadeOut",
              },
              toast,
              "button"
            );
          },
        ],
      ],
      onClosing: function (instance, toast, closedBy) {
        //  console.info('Closing | closedBy: ' + closedBy);
      },
      onClosed: function (instance, toast, closedBy) {
        // console.info('Closed | closedBy: ' + closedBy);
      },
    });
  }
}

function formatTime(time) {
  var time = time.split(":");
  var hours = parseInt(time[0]);
  var minutes = parseInt(time[1]);

  var modifiedHours = hours - 12;
  if (modifiedHours < 0) modifiedHours += 12;
  convertedTime = modifiedHours + ":" + minutes.toString().padStart(2, "0");
  console.log(hours);
  return convertedTime + getTimePeriod(hours);
}

function getTimePeriod(time) {
  if (parseInt(time) < 12) return "AM";
  return "PM";
}
