/*
 Highcharts JS v8.2.0 (2020-08-20)

 Data module

 (c) 2012-2019 Torstein Honsi

 License: www.highcharts.com/license
*/
(function (b) { "object" === typeof module && module.exports ? (b["default"] = b, module.exports = b) : "function" === typeof define && define.amd ? define("highcharts/modules/data", ["highcharts"], function (v) { b(v); b.Highcharts = v; return b }) : b("undefined" !== typeof Highcharts ? Highcharts : void 0) })(function (b) {
    function v(b, l, v, t) { b.hasOwnProperty(l) || (b[l] = t.apply(null, v)) } b = b ? b._modules : {}; v(b, "Extensions/Ajax.js", [b["Core/Globals.js"], b["Core/Utilities.js"]], function (b, l) {
        var v = l.merge, t = l.objectEach; b.ajax = function (b) {
            var p =
                v(!0, { url: !1, type: "get", dataType: "json", success: !1, error: !1, data: !1, headers: {} }, b); b = { json: "application/json", xml: "application/xml", text: "text/plain", octet: "application/octet-stream" }; var l = new XMLHttpRequest; if (!p.url) return !1; l.open(p.type.toUpperCase(), p.url, !0); p.headers["Content-Type"] || l.setRequestHeader("Content-Type", b[p.dataType] || b.text); t(p.headers, function (b, p) { l.setRequestHeader(p, b) }); l.onreadystatechange = function () {
                    if (4 === l.readyState) {
                        if (200 === l.status) {
                            var b = l.responseText; if ("json" ===
                                p.dataType) try { b = JSON.parse(b) } catch (C) { p.error && p.error(l, C); return } return p.success && p.success(b)
                        } p.error && p.error(l, l.responseText)
                    }
                }; try { p.data = JSON.stringify(p.data) } catch (D) { } l.send(p.data || !0)
        }; b.getJSON = function (l, p) { b.ajax({ url: l, success: p, dataType: "json", headers: { "Content-Type": "text/plain" } }) }; return { ajax: b.ajax, getJSON: b.getJSON }
    }); v(b, "Extensions/Data.js", [b["Core/Chart/Chart.js"], b["Core/Globals.js"], b["Core/Series/Point.js"], b["Core/Utilities.js"], b["Extensions/Ajax.js"]], function (b,
        l, v, t, H) {
        var p = t.addEvent, I = t.defined, D = t.extend, C = t.fireEvent, E = t.isNumber, A = t.merge, J = t.objectEach, K = t.pick, L = t.splat, F = H.ajax, M = l.win.document; t = function () {
            function b(a, c, f) {
                this.options = this.rawColumns = this.firstRowAsNames = this.chartOptions = this.chart = void 0; this.dateFormats = {
                    "YYYY/mm/dd": { regex: /^([0-9]{4})[\-\/\.]([0-9]{1,2})[\-\/\.]([0-9]{1,2})$/, parser: function (a) { return a ? Date.UTC(+a[1], a[2] - 1, +a[3]) : NaN } }, "dd/mm/YYYY": {
                        regex: /^([0-9]{1,2})[\-\/\.]([0-9]{1,2})[\-\/\.]([0-9]{4})$/, parser: function (a) {
                            return a ?
                                Date.UTC(+a[3], a[2] - 1, +a[1]) : NaN
                        }, alternative: "mm/dd/YYYY"
                    }, "mm/dd/YYYY": { regex: /^([0-9]{1,2})[\-\/\.]([0-9]{1,2})[\-\/\.]([0-9]{4})$/, parser: function (a) { return a ? Date.UTC(+a[3], a[1] - 1, +a[2]) : NaN } }, "dd/mm/YY": { regex: /^([0-9]{1,2})[\-\/\.]([0-9]{1,2})[\-\/\.]([0-9]{2})$/, parser: function (a) { if (!a) return NaN; var c = +a[3]; c = c > (new Date).getFullYear() - 2E3 ? c + 1900 : c + 2E3; return Date.UTC(c, a[2] - 1, +a[1]) }, alternative: "mm/dd/YY" }, "mm/dd/YY": {
                        regex: /^([0-9]{1,2})[\-\/\.]([0-9]{1,2})[\-\/\.]([0-9]{2})$/, parser: function (a) {
                            return a ?
                                Date.UTC(+a[3] + 2E3, a[1] - 1, +a[2]) : NaN
                        }
                    }
                }; this.init(a, c, f)
            } b.prototype.init = function (a, c, f) {
                var d = a.decimalPoint; c && (this.chartOptions = c); f && (this.chart = f); "." !== d && "," !== d && (d = void 0); this.options = a; this.columns = a.columns || this.rowsToColumns(a.rows) || []; this.firstRowAsNames = K(a.firstRowAsNames, this.firstRowAsNames, !0); this.decimalRegex = d && new RegExp("^(-?[0-9]+)" + d + "([0-9]+)$"); this.rawColumns = []; if (this.columns.length) { this.dataFound(); var g = !0 } this.hasURLOption(a) && (clearTimeout(this.liveDataTimeout),
                    g = !1); g || (g = this.fetchLiveData()); g || (g = !!this.parseCSV().length); g || (g = !!this.parseTable().length); g || (g = this.parseGoogleSpreadsheet()); !g && a.afterComplete && a.afterComplete()
            }; b.prototype.hasURLOption = function (a) { return !(!a || !(a.rowsURL || a.csvURL || a.columnsURL)) }; b.prototype.getColumnDistribution = function () {
                var a = this.chartOptions, c = this.options, f = [], d = function (a) { return (l.seriesTypes[a || "line"].prototype.pointArrayMap || [0]).length }, g = a && a.chart && a.chart.type, e = [], b = [], h = 0; c = c && c.seriesMapping ||
                    a && a.series && a.series.map(function () { return { x: 0 } }) || []; var k; (a && a.series || []).forEach(function (a) { e.push(d(a.type || g)) }); c.forEach(function (a) { f.push(a.x || 0) }); 0 === f.length && f.push(0); c.forEach(function (c) {
                        var f = new G, u = e[h] || d(g), r = (a && a.series || [])[h] || {}, w = l.seriesTypes[r.type || g || "line"].prototype.pointArrayMap, z = w || ["y"]; (I(c.x) || r.isCartesian || !w) && f.addColumnReader(c.x, "x"); J(c, function (a, c) { "x" !== c && f.addColumnReader(a, c) }); for (k = 0; k < u; k++)f.hasReader(z[k]) || f.addColumnReader(void 0, z[k]);
                        b.push(f); h++
                    }); c = l.seriesTypes[g || "line"].prototype.pointArrayMap; "undefined" === typeof c && (c = ["y"]); this.valueCount = { global: d(g), xColumns: f, individual: e, seriesBuilders: b, globalPointArrayMap: c }
            }; b.prototype.dataFound = function () { this.options.switchRowsAndColumns && (this.columns = this.rowsToColumns(this.columns)); this.getColumnDistribution(); this.parseTypes(); !1 !== this.parsed() && this.complete() }; b.prototype.parseCSV = function (a) {
                function c(a, c, f, d) {
                    function g(c) { h = a[c]; m = a[c - 1]; r = a[c + 1] } function b(a) {
                        x.length <
                            u + 1 && x.push([a]); x[u][x[u].length - 1] !== a && x[u].push(a)
                    } function e() { k > y || y > l ? (++y, q = "") : (!isNaN(parseFloat(q)) && isFinite(q) ? (q = parseFloat(q), b("number")) : isNaN(Date.parse(q)) ? b("string") : (q = q.replace(/\//g, "-"), b("date")), w.length < u + 1 && w.push([]), f || (w[u][c] = q), q = "", ++u, ++y) } var n = 0, h = "", m = "", r = "", q = "", y = 0, u = 0; if (a.trim().length && "#" !== a.trim()[0]) {
                        for (; n < a.length; n++) {
                            g(n); if ("#" === h) { e(); return } if ('"' === h) for (g(++n); n < a.length && ('"' !== h || '"' === m || '"' === r);) { if ('"' !== h || '"' === h && '"' !== m) q += h; g(++n) } else d &&
                                d[h] ? d[h](h, q) && e() : h === z ? e() : q += h
                        } e()
                    }
                } function f(a) {
                    var c = 0, f = 0, d = !1; a.some(function (a, d) { var g = !1, b = ""; if (13 < d) return !0; for (var e = 0; e < a.length; e++) { d = a[e]; var h = a[e + 1]; var k = a[e - 1]; if ("#" === d) break; if ('"' === d) if (g) { if ('"' !== k && '"' !== h) { for (; " " === h && e < a.length;)h = a[++e]; "undefined" !== typeof r[h] && r[h]++; g = !1 } } else g = !0; else "undefined" !== typeof r[d] ? (b = b.trim(), isNaN(Date.parse(b)) ? !isNaN(b) && isFinite(b) || r[d]++ : r[d]++, b = "") : b += d; "," === d && f++; "." === d && c++ } }); d = r[";"] > r[","] ? ";" : ","; e.decimalPoint ||
                        (e.decimalPoint = c > f ? "." : ",", g.decimalRegex = new RegExp("^(-?[0-9]+)" + e.decimalPoint + "([0-9]+)$")); return d
                } function d(a, c) {
                    var d = [], f = 0, b = !1, h = [], k = [], n; if (!c || c > a.length) c = a.length; for (; f < c; f++)if ("undefined" !== typeof a[f] && a[f] && a[f].length) {
                        var m = a[f].trim().replace(/\//g, " ").replace(/\-/g, " ").replace(/\./g, " ").split(" "); d = ["", "", ""]; for (n = 0; n < m.length; n++)n < d.length && (m[n] = parseInt(m[n], 10), m[n] && (k[n] = !k[n] || k[n] < m[n] ? m[n] : k[n], "undefined" !== typeof h[n] ? h[n] !== m[n] && (h[n] = !1) : h[n] = m[n], 31 <
                            m[n] ? d[n] = 100 > m[n] ? "YY" : "YYYY" : 12 < m[n] && 31 >= m[n] ? (d[n] = "dd", b = !0) : d[n].length || (d[n] = "mm")))
                    } if (b) { for (n = 0; n < h.length; n++)!1 !== h[n] ? 12 < k[n] && "YY" !== d[n] && "YYYY" !== d[n] && (d[n] = "YY") : 12 < k[n] && "mm" === d[n] && (d[n] = "dd"); 3 === d.length && "dd" === d[1] && "dd" === d[2] && (d[2] = "YY"); a = d.join("/"); return (e.dateFormats || g.dateFormats)[a] ? a : (C("deduceDateFailed"), "YYYY/mm/dd") } return "YYYY/mm/dd"
                } var g = this, e = a || this.options, b = e.csv; a = "undefined" !== typeof e.startRow && e.startRow ? e.startRow : 0; var h = e.endRow || Number.MAX_VALUE,
                    k = "undefined" !== typeof e.startColumn && e.startColumn ? e.startColumn : 0, l = e.endColumn || Number.MAX_VALUE, m = 0, x = [], r = { ",": 0, ";": 0, "\t": 0 }; var w = this.columns = []; b && e.beforeParse && (b = e.beforeParse.call(this, b)); if (b) {
                        b = b.replace(/\r\n/g, "\n").replace(/\r/g, "\n").split(e.lineDelimiter || "\n"); if (!a || 0 > a) a = 0; if (!h || h >= b.length) h = b.length - 1; if (e.itemDelimiter) var z = e.itemDelimiter; else z = null, z = f(b); var y = 0; for (m = a; m <= h; m++)"#" === b[m][0] ? y++ : c(b[m], m - a - y); e.columnTypes && 0 !== e.columnTypes.length || !x.length || !x[0].length ||
                            "date" !== x[0][1] || e.dateFormat || (e.dateFormat = d(w[0])); this.dataFound()
                    } return w
            }; b.prototype.parseTable = function () {
                var a = this.options, c = a.table, f = this.columns || [], d = a.startRow || 0, b = a.endRow || Number.MAX_VALUE, e = a.startColumn || 0, u = a.endColumn || Number.MAX_VALUE; c && ("string" === typeof c && (c = M.getElementById(c)), [].forEach.call(c.getElementsByTagName("tr"), function (a, c) {
                    c >= d && c <= b && [].forEach.call(a.children, function (a, b) {
                        var g = f[b - e], h = 1; if (("TD" === a.tagName || "TH" === a.tagName) && b >= e && b <= u) for (f[b - e] ||
                            (f[b - e] = []), f[b - e][c - d] = a.innerHTML; c - d >= h && void 0 === g[c - d - h];)g[c - d - h] = null, h++
                    })
                }), this.dataFound()); return f
            }; b.prototype.fetchLiveData = function () {
                function a(g) {
                    function k(h, k, l) {
                        function m() { e && f.liveDataURL === h && (c.liveDataTimeout = setTimeout(a, u)) } if (!h || 0 !== h.indexOf("http")) return h && d.error && d.error("Invalid URL"), !1; g && (clearTimeout(c.liveDataTimeout), f.liveDataURL = h); F({
                            url: h, dataType: l || "json", success: function (a) { f && f.series && k(a); m() }, error: function (a, c) {
                                3 > ++b && m(); return d.error && d.error(c,
                                    a)
                            }
                        }); return !0
                    } k(h.csvURL, function (a) { f.update({ data: { csv: a } }) }, "text") || k(h.rowsURL, function (a) { f.update({ data: { rows: a } }) }) || k(h.columnsURL, function (a) { f.update({ data: { columns: a } }) })
                } var c = this, f = this.chart, d = this.options, b = 0, e = d.enablePolling, u = 1E3 * (d.dataRefreshRate || 2), h = A(d); if (!this.hasURLOption(d)) return !1; 1E3 > u && (u = 1E3); delete d.csvURL; delete d.rowsURL; delete d.columnsURL; a(!0); return this.hasURLOption(d)
            }; b.prototype.parseGoogleSpreadsheet = function () {
                function a(c) {
                    var b = ["https://spreadsheets.google.com/feeds/cells",
                        d, e, "public/values?alt=json"].join("/"); F({ url: b, dataType: "json", success: function (d) { c(d); f.enablePolling && setTimeout(function () { a(c) }, 1E3 * (f.dataRefreshRate || 2)) }, error: function (a, c) { return f.error && f.error(c, a) } })
                } var c = this, f = this.options, d = f.googleSpreadsheetKey, b = this.chart, e = f.googleSpreadsheetWorksheet || 1, u = f.startRow || 0, h = f.endRow || Number.MAX_VALUE, k = f.startColumn || 0, l = f.endColumn || Number.MAX_VALUE, m = 1E3 * (f.dataRefreshRate || 2); 4E3 > m && (m = 4E3); d && (delete f.googleSpreadsheetKey, a(function (a) {
                    var d =
                        []; a = a.feed.entry; var f = (a || []).length, g = 0, e; if (!a || 0 === a.length) return !1; for (e = 0; e < f; e++) { var m = a[e]; g = Math.max(g, m.gs$cell.col) } for (e = 0; e < g; e++)e >= k && e <= l && (d[e - k] = []); for (e = 0; e < f; e++) { m = a[e]; g = m.gs$cell.row - 1; var p = m.gs$cell.col - 1; if (p >= k && p <= l && g >= u && g <= h) { var q = m.gs$cell || m.content; m = null; q.numericValue ? m = 0 <= q.$t.indexOf("/") || 0 <= q.$t.indexOf("-") ? q.$t : 0 < q.$t.indexOf("%") ? 100 * parseFloat(q.numericValue) : parseFloat(q.numericValue) : q.$t && q.$t.length && (m = q.$t); d[p - k][g - u] = m } } d.forEach(function (a) {
                            for (e =
                                0; e < a.length; e++)"undefined" === typeof a[e] && (a[e] = null)
                        }); b && b.series ? b.update({ data: { columns: d } }) : (c.columns = d, c.dataFound())
                })); return !1
            }; b.prototype.trim = function (a, c) { "string" === typeof a && (a = a.replace(/^\s+|\s+$/g, ""), c && /^[0-9\s]+$/.test(a) && (a = a.replace(/\s/g, "")), this.decimalRegex && (a = a.replace(this.decimalRegex, "$1.$2"))); return a }; b.prototype.parseTypes = function () { for (var a = this.columns, c = a.length; c--;)this.parseColumn(a[c], c) }; b.prototype.parseColumn = function (a, c) {
                var f = this.rawColumns,
                    d = this.columns, b = a.length, e = this.firstRowAsNames, l = -1 !== this.valueCount.xColumns.indexOf(c), h, k = [], p = this.chartOptions, m, t = (this.options.columnTypes || [])[c]; p = l && (p && p.xAxis && "category" === L(p.xAxis)[0].type || "string" === t); for (f[c] || (f[c] = []); b--;) {
                        var r = k[b] || a[b]; var w = this.trim(r); var v = this.trim(r, !0); var B = parseFloat(v); "undefined" === typeof f[c][b] && (f[c][b] = w); p || 0 === b && e ? a[b] = "" + w : +v === B ? (a[b] = B, 31536E6 < B && "float" !== t ? a.isDatetime = !0 : a.isNumeric = !0, "undefined" !== typeof a[b + 1] && (m = B > a[b + 1])) :
                            (w && w.length && (h = this.parseDate(r)), l && E(h) && "float" !== t ? (k[b] = r, a[b] = h, a.isDatetime = !0, "undefined" !== typeof a[b + 1] && (r = h > a[b + 1], r !== m && "undefined" !== typeof m && (this.alternativeFormat ? (this.dateFormat = this.alternativeFormat, b = a.length, this.alternativeFormat = this.dateFormats[this.dateFormat].alternative) : a.unsorted = !0), m = r)) : (a[b] = "" === w ? null : w, 0 !== b && (a.isDatetime || a.isNumeric) && (a.mixed = !0)))
                    } l && a.mixed && (d[c] = f[c]); if (l && m && this.options.sort) for (c = 0; c < d.length; c++)d[c].reverse(), e && d[c].unshift(d[c].pop())
            };
            b.prototype.parseDate = function (a) {
                var c = this.options.parseDate, b, d = this.options.dateFormat || this.dateFormat, g; if (c) var e = c(a); else if ("string" === typeof a) {
                    if (d) (c = this.dateFormats[d]) || (c = this.dateFormats["YYYY/mm/dd"]), (g = a.match(c.regex)) && (e = c.parser(g)); else for (b in this.dateFormats) if (c = this.dateFormats[b], g = a.match(c.regex)) { this.dateFormat = b; this.alternativeFormat = c.alternative; e = c.parser(g); break } g || (g = Date.parse(a), "object" === typeof g && null !== g && g.getTime ? e = g.getTime() - 6E4 * g.getTimezoneOffset() :
                        E(g) && (e = g - 6E4 * (new Date(g)).getTimezoneOffset()))
                } return e
            }; b.prototype.rowsToColumns = function (a) { var c, b; if (a) { var d = []; var g = a.length; for (c = 0; c < g; c++) { var e = a[c].length; for (b = 0; b < e; b++)d[b] || (d[b] = []), d[b][c] = a[c][b] } } return d }; b.prototype.getData = function () { if (this.columns) return this.rowsToColumns(this.columns).slice(1) }; b.prototype.parsed = function () { if (this.options.parsed) return this.options.parsed.call(this, this.columns) }; b.prototype.getFreeIndexes = function (a, c) {
                var b, d = [], g = []; for (b = 0; b < a; b +=
                    1)d.push(!0); for (a = 0; a < c.length; a += 1) { var e = c[a].getReferencedColumnIndexes(); for (b = 0; b < e.length; b += 1)d[e[b]] = !1 } for (b = 0; b < d.length; b += 1)d[b] && g.push(b); return g
            }; b.prototype.complete = function () {
                var a = this.columns, c, b = this.options, d, g, e = []; if (b.complete || b.afterComplete) {
                    if (this.firstRowAsNames) for (d = 0; d < a.length; d++)a[d].name = a[d].shift(); var l = []; var h = this.getFreeIndexes(a.length, this.valueCount.seriesBuilders); for (d = 0; d < this.valueCount.seriesBuilders.length; d++) {
                        var k = this.valueCount.seriesBuilders[d];
                        k.populateColumns(h) && e.push(k)
                    } for (; 0 < h.length;) { k = new G; k.addColumnReader(0, "x"); d = h.indexOf(0); -1 !== d && h.splice(d, 1); for (d = 0; d < this.valueCount.global; d++)k.addColumnReader(void 0, this.valueCount.globalPointArrayMap[d]); k.populateColumns(h) && e.push(k) } 0 < e.length && 0 < e[0].readers.length && (k = a[e[0].readers[0].columnIndex], "undefined" !== typeof k && (k.isDatetime ? c = "datetime" : k.isNumeric || (c = "category"))); if ("category" === c) for (d = 0; d < e.length; d++)for (k = e[d], h = 0; h < k.readers.length; h++)"x" === k.readers[h].configName &&
                        (k.readers[h].configName = "name"); for (d = 0; d < e.length; d++) { k = e[d]; h = []; for (g = 0; g < a[0].length; g++)h[g] = k.read(a, g); l[d] = { data: h }; k.name && (l[d].name = k.name); "category" === c && (l[d].turboThreshold = 0) } a = { series: l }; c && (a.xAxis = { type: c }, "category" === c && (a.xAxis.uniqueNames = !1)); b.complete && b.complete(a); b.afterComplete && b.afterComplete(a)
                }
            }; b.prototype.update = function (a, b) {
                var c = this.chart; a && (a.afterComplete = function (a) {
                    a && (a.xAxis && c.xAxis[0] && a.xAxis.type === c.xAxis[0].options.type && delete a.xAxis, c.update(a,
                        b, !0))
                }, A(!0, c.options.data, a), this.init(c.options.data))
            }; return b
        }(); l.data = function (b, a, c) { return new l.Data(b, a, c) }; p(b, "init", function (b) {
            var a = this, c = b.args[0] || {}, f = b.args[1]; c && c.data && !a.hasDataDef && (a.hasDataDef = !0, a.data = new l.Data(D(c.data, {
                afterComplete: function (b) {
                    var d; if (Object.hasOwnProperty.call(c, "series")) if ("object" === typeof c.series) for (d = Math.max(c.series.length, b && b.series ? b.series.length : 0); d--;) { var e = c.series[d] || {}; c.series[d] = A(e, b && b.series ? b.series[d] : {}) } else delete c.series;
                    c = A(b, c); a.init(c, f)
                }
            }), c, a), b.preventDefault())
        }); var G = function () {
            function b() { this.readers = []; this.pointIsArray = !0; this.name = void 0 } b.prototype.populateColumns = function (a) { var b = !0; this.readers.forEach(function (b) { "undefined" === typeof b.columnIndex && (b.columnIndex = a.shift()) }); this.readers.forEach(function (a) { "undefined" === typeof a.columnIndex && (b = !1) }); return b }; b.prototype.read = function (a, b) {
                var c = this.pointIsArray, d = c ? [] : {}; this.readers.forEach(function (e) {
                    var f = a[e.columnIndex][b]; c ? d.push(f) :
                        0 < e.configName.indexOf(".") ? v.prototype.setNestedProperty(d, f, e.configName) : d[e.configName] = f
                }); if ("undefined" === typeof this.name && 2 <= this.readers.length) { var g = this.getReferencedColumnIndexes(); 2 <= g.length && (g.shift(), g.sort(function (a, b) { return a - b }), this.name = a[g.shift()].name) } return d
            }; b.prototype.addColumnReader = function (a, b) { this.readers.push({ columnIndex: a, configName: b }); "x" !== b && "y" !== b && "undefined" !== typeof b && (this.pointIsArray = !1) }; b.prototype.getReferencedColumnIndexes = function () {
                var a,
                    b = []; for (a = 0; a < this.readers.length; a += 1) { var f = this.readers[a]; "undefined" !== typeof f.columnIndex && b.push(f.columnIndex) } return b
            }; b.prototype.hasReader = function (a) { var b; for (b = 0; b < this.readers.length; b += 1) { var f = this.readers[b]; if (f.configName === a) return !0 } }; return b
        }(); l.Data = t; return l.Data
    }); v(b, "masters/modules/data.src.js", [], function () { })
});
    //# sourceMappingURL=data.js.map