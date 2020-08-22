(function() {
    $(".prevent-mutiple-form-submit").on("submit", function() {
        $(".prevent-mutiple-button-submit").attr("disabled", true);
        $(".spinner").show();
    });
})();
