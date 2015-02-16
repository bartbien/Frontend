function AutologinLinkToFormTransformer() {
    'use strict';

    var _this = this;
    this.clickedLink = null;

    this.init = function() {
        findLinksAndBindTransformation();
    }

    var findLinksAndBindTransformation = function() {
        var links = getMatchingLinks();
        bindTransformationToLinks(links);
    }

    var getMatchingLinks = function() {
        return $('h2#logo a').add('a[href*="/gielda-domen/"]').add('a[href*="/antywirus/pobierz/"]');
    }

    var bindTransformationToLinks = function(links) {
        links.bind('click', function() {
            _this.clickedLink = $(this);
            checkIfClientIsAuthenticatedInPkAndContinue();
            return false;
        });
    }

    var rollbackAndContinue = function() {
        _this.clickedLink.unbind('click');
        window.location = _this.clickedLink.attr('href');
    }

    var checkIfClientIsAuthenticatedInPkAndContinue = function() {
        if ('' == getClientLogin()) {
            rollbackAndContinue();
            return;
        }

        getAutologinTokenAndPostToLoginForm();
    }

    var getClientLogin = function() {
        return $('#head h4 strong').text();
    }

    var getAutologinTokenAndPostToLoginForm = function() {
        $.ajax({
            type : 'POST',
            url : "ClientGenerateLoginTokenAndGetSessionId.json",
            success : function(response) {
                if (response.hasErrors) {
                    rollbackAndContinue();
                    return;
                }

                sendAutologinRequest(response.result);
            },
            error: function(){
                rollbackAndContinue();
            }
        });
    }

    var sendAutologinRequest = function(response) {
        window.location = NA.getNazwaUrl() + 'zaloguj-sie/?authToken=' + response.token + '&_s=' + response.sid + '&clientLogin=' + getClientLogin()
            + '&url='+ _this.clickedLink.attr('href');
    }

}
