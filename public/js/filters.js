angular.module('bens-penhorados-filters', []).filter('vehicleCondition', function() {
    return function(goodCondition) {
        if (goodCondition === true) {
            return 'Bom/Razoável';
        }
        if (goodCondition === false) {
            return 'Mau';
        }
    }
}).filter('generateLink', function() {
    var base_url = 'http://www.e-financas.gov.pt/vendas/detalheVenda.action';

    return function(code) {
        if (code) {
            var values = code.split('.');
            return base_url + '?sf=' + values[0] + '&ano=' + values[1] + '&idVenda=' + values[2];
        }
    }
});