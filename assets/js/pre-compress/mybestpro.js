/**
 * ブログパーツ
 * @param {String} proId プロID
 * @param {Object} size ブログパーツの幅・高さ
 * @returns {void}
 */
var MbpHiroshima = {
    hostname: 'mbp-hiroshima.com',
    defWidth: 160, // 幅のデフォルト値
    minWidth: 160, // 幅の最小値
    maxWidth: 500, // 幅の最大値
    defHeight: 390, // 高さのデフォルト値
    minHeight: 250, // 高さの最小値
    maxHeight: 3000, // 高さの最大値

    makeCode: function(proId, size) {
        var self = this;
        var url,
        bpHtml,
        width = self.defWidth + 'px',
            width2 = self.defWidth,
            height = self.defHeight + 'px',
            height2 = self.defHeight,
            query = '&h=' + self.defHeight,
            tmpWidth,
            tmpHeight,
            tmpQuery = '';

        url = '//' + self.hostname + '/column_feed/';

        if (typeof size === 'object') {
            if (typeof size.wfit !== 'undefined' && size.wfit !== null && size.wfit !== '') {
                width = '100%';
                width2 = '100%';
            } else if ((typeof size.width === 'number' || typeof size.width === 'string') && size.width !== '') {
                tmpWidth = size.width;
                if (typeof tmpWidth === 'string') {
                    tmpWidth = parseInt(tmpWidth, 10);
                }

                if (tmpWidth < self.minWidth) {
                    width = self.minWidth + 'px';
                    width2 = self.minWidth;
                } else if (self.maxWidth < tmpWidth) {
                    width = self.maxWidth + 'px';
                    width2 = self.maxWidth;
                } else {
                    width = tmpWidth + 'px';
                    width2 = tmpWidth;
                }
            }

            if ((typeof size.height === 'number' || typeof size.height === 'string') && size.height !== '') {
                tmpHeight = size.height;
                if (typeof tmpHeight === 'string') {
                    tmpHeight = parseInt(tmpHeight, 10);
                }

                if (tmpHeight < self.minHeight) {
                    height = self.minHeight + 'px';
                    height2 = self.minHeight;
                    tmpQuery += '&h=' + self.minHeight;
                } else if (self.maxHeight < tmpHeight) {
                    height = self.maxHeight + 'px';
                    height2 = self.maxHeight;
                    tmpQuery += '&h=' + self.maxHeight;
                } else {
                    height = tmpHeight + 'px';
                    height2 = tmpHeight;
                    tmpQuery += '&h=' + tmpHeight;
                }
            }
        }

        if (tmpQuery !== '') {
            query = tmpQuery;
        }

        bpHtml = '<iframe' + ' title="マイベストプロコラム"' + ' src="' + url + '?id=' + proId + query + '"' + ' style="border: medium none;  margin: 0px; padding: 0px; display: inline-block; position: static; visibility: visible; width: ' + width + '; height: ' + height + ';"' + ' allowfullscreen=""' + ' class=""' + ' allowtransparency="true"' + ' scrolling="no"' + ' id=""' + ' frameborder="0"' + ' width="' + width2 + '"' + ' height="' + height2 + '"' + '></iframe>';
        return bpHtml;
    },

    getCode: function(proId, size) {
        var self = this,
            bpHtml = self.makeCode(proId, size);
        return bpHtml;
    },

    init: function(proId, size) {
        var self = this,
            bpHtml = self.makeCode(proId, size);
        document.write(bpHtml);
    }
};