/*
 Highcharts JS v8.2.0 (2020-08-20)

 Highcharts Drilldown module

 Author: Torstein Honsi
 License: www.highcharts.com/license

*/
(function (c) { "object" === typeof module && module.exports ? (c["default"] = c, module.exports = c) : "function" === typeof define && define.amd ? define("highcharts/modules/drilldown", ["highcharts"], function (m) { c(m); c.Highcharts = m; return c }) : c("undefined" !== typeof Highcharts ? Highcharts : void 0) })(function (c) {
    function m(c, m, p, t) { c.hasOwnProperty(m) || (c[m] = t.apply(null, p)) } c = c ? c._modules : {}; m(c, "Extensions/Drilldown.js", [c["Core/Chart/Chart.js"], c["Core/Color.js"], c["Core/Globals.js"], c["Core/Options.js"], c["Core/Series/Point.js"],
    c["Core/Renderer/SVG/SVGRenderer.js"], c["Core/Axis/Tick.js"], c["Core/Utilities.js"]], function (c, m, p, t, y, E, A, k) {
        t = t.defaultOptions; var n = k.addEvent, F = k.removeEvent, B = k.animObject, u = k.extend, x = k.fireEvent, G = k.format, v = k.merge, C = k.objectEach, w = k.pick, H = k.syncTimeout, I = p.noop, q = p.seriesTypes; k = q.pie; q = q.column; var D = 1; u(t.lang, { drillUpText: "\u25c1 Back to {series.name}" }); t.drilldown = {
            activeAxisLabelStyle: { cursor: "pointer", color: "#003399", fontWeight: "bold", textDecoration: "underline" }, activeDataLabelStyle: {
                cursor: "pointer",
                color: "#003399", fontWeight: "bold", textDecoration: "underline"
            }, animation: { duration: 500 }, drillUpButton: { position: { align: "right", x: -10, y: 10 } }
        }; E.prototype.Element.prototype.fadeIn = function (a) { this.attr({ opacity: .1, visibility: "inherit" }).animate({ opacity: w(this.newOpacity, 1) }, a || { duration: 250 }) }; c.prototype.addSeriesAsDrilldown = function (a, b) { this.addSingleSeriesAsDrilldown(a, b); this.applyDrilldown() }; c.prototype.addSingleSeriesAsDrilldown = function (a, b) {
            var d = a.series, f = d.xAxis, e = d.yAxis, g = [], r = [], h; var l =
                this.styledMode ? { colorIndex: w(a.colorIndex, d.colorIndex) } : { color: a.color || d.color }; this.drilldownLevels || (this.drilldownLevels = []); var c = d.options._levelNumber || 0; (h = this.drilldownLevels[this.drilldownLevels.length - 1]) && h.levelNumber !== c && (h = void 0); b = u(u({ _ddSeriesId: D++ }, l), b); var k = d.points.indexOf(a); d.chart.series.forEach(function (a) {
                    a.xAxis !== f || a.isDrilling || (a.options._ddSeriesId = a.options._ddSeriesId || D++, a.options._colorIndex = a.userOptions._colorIndex, a.options._levelNumber = a.options._levelNumber ||
                        c, h ? (g = h.levelSeries, r = h.levelSeriesOptions) : (g.push(a), a.purgedOptions = v({ _ddSeriesId: a.options._ddSeriesId, _levelNumber: a.options._levelNumber, selected: a.options.selected }, a.userOptions), r.push(a.purgedOptions)))
                }); a = u({
                    levelNumber: c, seriesOptions: d.options, seriesPurgedOptions: d.purgedOptions, levelSeriesOptions: r, levelSeries: g, shapeArgs: a.shapeArgs, bBox: a.graphic ? a.graphic.getBBox() : {}, color: a.isNull ? (new m(l.color)).setOpacity(0).get() : l.color, lowerSeriesOptions: b, pointOptions: d.options.data[k],
                    pointIndex: k, oldExtremes: { xMin: f && f.userMin, xMax: f && f.userMax, yMin: e && e.userMin, yMax: e && e.userMax }, resetZoomButton: this.resetZoomButton
                }, l); this.drilldownLevels.push(a); f && f.names && (f.names.length = 0); b = a.lowerSeries = this.addSeries(b, !1); b.options._levelNumber = c + 1; f && (f.oldPos = f.pos, f.userMin = f.userMax = null, e.userMin = e.userMax = null); d.type === b.type && (b.animate = b.animateDrilldown || I, b.options.animation = !0)
        }; c.prototype.applyDrilldown = function () {
            var a = this.drilldownLevels; if (a && 0 < a.length) {
                var b = a[a.length -
                    1].levelNumber; this.drilldownLevels.forEach(function (a) { a.levelNumber === b && a.levelSeries.forEach(function (a) { a.options && a.options._levelNumber === b && a.remove(!1) }) })
            } this.resetZoomButton && (this.resetZoomButton.hide(), delete this.resetZoomButton); this.pointer.reset(); this.redraw(); this.showDrillUpButton(); x(this, "afterDrilldown")
        }; c.prototype.getDrilldownBackText = function () { var a = this.drilldownLevels; if (a && 0 < a.length) return a = a[a.length - 1], a.series = a.seriesOptions, G(this.options.lang.drillUpText, a) };
        c.prototype.showDrillUpButton = function () { var a = this, b = this.getDrilldownBackText(), d = a.options.drilldown.drillUpButton, f; if (this.drillUpButton) this.drillUpButton.attr({ text: b }).align(); else { var e = (f = d.theme) && f.states; this.drillUpButton = this.renderer.button(b, null, null, function () { a.drillUp() }, f, e && e.hover, e && e.select).addClass("highcharts-drillup-button").attr({ align: d.position.align, zIndex: 7 }).add().align(d.position, !1, d.relativeTo || "plotBox") } }; c.prototype.drillUp = function () {
            if (this.drilldownLevels &&
                0 !== this.drilldownLevels.length) {
                    for (var a = this, b = a.drilldownLevels, d = b[b.length - 1].levelNumber, f = b.length, e = a.series, g, c, h, l, k = function (b) { e.forEach(function (a) { a.options._ddSeriesId === b._ddSeriesId && (d = a) }); var d = d || a.addSeries(b, !1); d.type === h.type && d.animateDrillupTo && (d.animate = d.animateDrillupTo); b === c.seriesPurgedOptions && (l = d) }; f--;)if (c = b[f], c.levelNumber === d) {
                        b.pop(); h = c.lowerSeries; if (!h.chart) for (g = e.length; g--;)if (e[g].options.id === c.lowerSeriesOptions.id && e[g].options._levelNumber ===
                            d + 1) { h = e[g]; break } h.xData = []; c.levelSeriesOptions.forEach(k); x(a, "drillup", { seriesOptions: c.seriesPurgedOptions || c.seriesOptions }); l.type === h.type && (l.drilldownLevel = c, l.options.animation = a.options.drilldown.animation, h.animateDrillupFrom && h.chart && h.animateDrillupFrom(c)); l.options._levelNumber = d; h.remove(!1); l.xAxis && (g = c.oldExtremes, l.xAxis.setExtremes(g.xMin, g.xMax, !1), l.yAxis.setExtremes(g.yMin, g.yMax, !1)); c.resetZoomButton && (a.resetZoomButton = c.resetZoomButton, a.resetZoomButton.show())
                    } this.redraw();
                0 === this.drilldownLevels.length ? this.drillUpButton = this.drillUpButton.destroy() : this.drillUpButton.attr({ text: this.getDrilldownBackText() }).align(); this.ddDupes.length = []; x(a, "drillupall")
            }
        }; n(c, "afterInit", function () { var a = this; a.drilldown = { update: function (b, d) { v(!0, a.options.drilldown, b); w(d, !0) && a.redraw() } } }); n(c, "beforeShowResetZoom", function () { if (this.drillUpButton) return !1 }); n(c, "render", function () {
            (this.xAxis || []).forEach(function (a) {
                a.ddPoints = {}; a.series.forEach(function (b) {
                    var d, f = b.xData ||
                        [], e = b.points; for (d = 0; d < f.length; d++) { var c = b.options.data[d]; "number" !== typeof c && (c = b.pointClass.prototype.optionsToObject.call({ series: b }, c), c.drilldown && (a.ddPoints[f[d]] || (a.ddPoints[f[d]] = []), a.ddPoints[f[d]].push(e ? e[d] : !0))) }
                }); C(a.ticks, A.prototype.drillable)
            })
        }); q.prototype.animateDrillupTo = function (a) {
            if (!a) {
                var b = this, d = b.drilldownLevel; this.points.forEach(function (a) {
                    var b = a.dataLabel; a.graphic && a.graphic.hide(); b && (b.hidden = "hidden" === b.attr("visibility"), b.hidden || (b.hide(), a.connector &&
                        a.connector.hide()))
                }); H(function () { b.points && b.points.forEach(function (a, b) { b = b === (d && d.pointIndex) ? "show" : "fadeIn"; var c = "show" === b ? !0 : void 0, f = a.dataLabel; if (a.graphic) a.graphic[b](c); f && !f.hidden && (f.fadeIn(), a.connector && a.connector.fadeIn()) }) }, Math.max(this.chart.options.drilldown.animation.duration - 50, 0)); delete this.animate
            }
        }; q.prototype.animateDrilldown = function (a) {
            var b = this, d = this.chart, c = d.drilldownLevels, e, g = B(d.options.drilldown.animation), r = this.xAxis, h = d.styledMode; a || (c.forEach(function (a) {
                b.options._ddSeriesId ===
                a.lowerSeriesOptions._ddSeriesId && (e = a.shapeArgs, h || (e.fill = a.color))
            }), e.x += w(r.oldPos, r.pos) - r.pos, this.points.forEach(function (a) { var d = a.shapeArgs; h || (d.fill = a.color); a.graphic && a.graphic.attr(e).animate(u(a.shapeArgs, { fill: a.color || b.color }), g); a.dataLabel && a.dataLabel.fadeIn(g) }), delete this.animate)
        }; q.prototype.animateDrillupFrom = function (a) {
            var b = B(this.chart.options.drilldown.animation), d = this.group, c = d !== this.chart.columnGroup, e = this; e.trackerGroups.forEach(function (a) { if (e[a]) e[a].on("mouseover") });
            c && delete this.group; this.points.forEach(function (f) { var g = f.graphic, h = a.shapeArgs, l = function () { g.destroy(); d && c && (d = d.destroy()) }; g && h && (delete f.graphic, e.chart.styledMode || (h.fill = a.color), b.duration ? g.animate(h, v(b, { complete: l })) : (g.attr(h), l())) })
        }; k && u(k.prototype, {
            animateDrillupTo: q.prototype.animateDrillupTo, animateDrillupFrom: q.prototype.animateDrillupFrom, animateDrilldown: function (a) {
                var b = this.chart.drilldownLevels[this.chart.drilldownLevels.length - 1], d = this.chart.options.drilldown.animation;
                this.is("item") && (d.duration = 0); if (this.center) { var c = b.shapeArgs, e = c.start, g = (c.end - e) / this.points.length, k = this.chart.styledMode; a || (this.points.forEach(function (a, f) { var h = a.shapeArgs; k || (c.fill = b.color, h.fill = a.color); if (a.graphic) a.graphic.attr(v(c, { start: e + f * g, end: e + (f + 1) * g }))[d ? "animate" : "attr"](h, d) }), delete this.animate) }
            }
        }); y.prototype.doDrilldown = function (a, b, d) {
            var c = this.series.chart, e = c.options.drilldown, g = (e.series || []).length; c.ddDupes || (c.ddDupes = []); for (; g-- && !k;)if (e.series[g].id ===
                this.drilldown && -1 === c.ddDupes.indexOf(this.drilldown)) { var k = e.series[g]; c.ddDupes.push(this.drilldown) } x(c, "drilldown", { point: this, seriesOptions: k, category: b, originalEvent: d, points: "undefined" !== typeof b && this.series.xAxis.getDDPoints(b).slice(0) }, function (b) { var d = b.point.series && b.point.series.chart, c = b.seriesOptions; d && c && (a ? d.addSingleSeriesAsDrilldown(b.point, c) : d.addSeriesAsDrilldown(b.point, c)) })
        }; p.Axis.prototype.drilldownCategory = function (a, b) {
            C(this.getDDPoints(a), function (d) {
                d && d.series &&
                d.series.visible && d.doDrilldown && d.doDrilldown(!0, a, b)
            }); this.chart.applyDrilldown()
        }; p.Axis.prototype.getDDPoints = function (a) { return this.ddPoints && this.ddPoints[a] }; A.prototype.drillable = function () {
            var a = this.pos, b = this.label, d = this.axis, c = "xAxis" === d.coll && d.getDDPoints, e = c && d.getDDPoints(a), g = d.chart.styledMode; c && (b && e && e.length ? (b.drillable = !0, b.basicStyles || g || (b.basicStyles = v(b.styles)), b.addClass("highcharts-drilldown-axis-label"), b.removeOnDrillableClick && F(b.element, "click"), b.removeOnDrillableClick =
                n(b.element, "click", function (b) { b.preventDefault(); d.drilldownCategory(a, b) }), g || b.css(d.chart.options.drilldown.activeAxisLabelStyle)) : b && b.drillable && b.removeOnDrillableClick && (g || (b.styles = {}, b.css(b.basicStyles)), b.removeOnDrillableClick(), b.removeClass("highcharts-drilldown-axis-label")))
        }; n(y, "afterInit", function () {
            var a = this, b = a.series; a.drilldown && n(a, "click", function (c) {
                b.xAxis && !1 === b.chart.options.drilldown.allowPointDrilldown ? b.xAxis.drilldownCategory(a.x, c) : a.doDrilldown(void 0, void 0,
                    c)
            }); return a
        }); n(p.Series, "afterDrawDataLabels", function () { var a = this.chart.options.drilldown.activeDataLabelStyle, b = this.chart.renderer, c = this.chart.styledMode; this.points.forEach(function (d) { var e = d.options.dataLabels, f = w(d.dlOptions, e && e.style, {}); d.drilldown && d.dataLabel && ("contrast" !== a.color || c || (f.color = b.getContrast(d.color || this.color)), e && e.color && (f.color = e.color), d.dataLabel.addClass("highcharts-drilldown-data-label"), c || d.dataLabel.css(a).css(f)) }, this) }); var z = function (a, b, c, f) {
            a[c ?
                "addClass" : "removeClass"]("highcharts-drilldown-point"); f || a.css({ cursor: b })
        }; n(p.Series, "afterDrawTracker", function () { var a = this.chart.styledMode; this.points.forEach(function (b) { b.drilldown && b.graphic && z(b.graphic, "pointer", !0, a) }) }); n(y, "afterSetState", function () { var a = this.series.chart.styledMode; this.drilldown && this.series.halo && "hover" === this.state ? z(this.series.halo, "pointer", !0, a) : this.series.halo && z(this.series.halo, "auto", !1, a) })
    }); m(c, "masters/modules/drilldown.src.js", [], function () { })
});
//# sourceMappingURL=drilldown.js.map