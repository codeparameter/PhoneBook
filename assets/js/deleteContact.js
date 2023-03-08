$(document).ready(function () {
  let selectedContacts = [];
  let allSelected = false;

  $(".deleteContact").click(function () {
    const targetLink = $(this).attr("data-target");
    $.post(targetLink, function (response) {
      console.log(response);
      if (response["status"] === "OK") {
        window.location.href = "/";
      }
    });
  });

  $(".selectContact").click(function () {
    const contactID = $(this).attr("data-contact-id");
    if (this.checked) selectedContacts.push(contactID);
    else selectedContacts = selectedContacts.filter((id) => id !== contactID);
  });

  $("#selectAll").click(function () {
    allSelected = !allSelected;
    $('.selectContact').each(function(){
        if($(this).prop("checked") !== allSelected)
            $(this).click();
    });
  });

  $("#deleteMultiple").click(function (){
    const targetLink = $(this).attr("data-target") + "?contacts[]=" + selectedContacts.join(',');
    $.post(targetLink, function (response) {
      if (response["status"] === "OK") {
        window.location.href = "/";
      }
    });
  });
});
