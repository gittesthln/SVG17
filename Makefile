#FULL = 00svg-all
FULL = 00svg-seminor
PLATEX = platex -kanji=UTF8 
PDFS =  $(FULL).pdf
GS = gswin$(O)c -dNOPAUSE -dBATCH -sDEVICE=pdfwrite 
DVIPS = dvips -Ppdf

HP = HP/
YEAR = 2018
FULLFILES = $(FULL).tex $(MACRO) $(CH1) $(CH2) $(CH3) \
    $(Appendix) $(INSTALL) 
# $(CH2) $(CH3) $(CH4) \
#            $(CH5) $(CH6) $(CH7) $(CH8)

DVI2PDF = dvipdfmo
#DVI2PDF = dvipdfm
CH1 = CH1/01whatissvg.tex CH1/0101svg.tex CH1/0120howtoseeSVG.tex \
      CH1/0110xml.tex  CH1/0130html5.tex CH1/$(CH1SVG)
CH2 = CH2/02fundamentalfigs.tex CH2/0201svgfirst.tex CH2/0202circle.tex \
      CH2/0230gradiation.tex CH2/0240opacity.tex
#$(CH2SVG)
CH3 = CH3/03object.tex CH3/0310polyline.tex CH3/0340path.tex \
      CH3/0350pattern.tex CH3/0360image.tex CH3/0370mask.tex
#		$(CH3SVG)
CH3B = CH3/0310polyline.tex 
CH4 = CH4/04animation.tex CH4/0480animation-example.tex
#$(CH4SVG)
CH5 = CH5/05showingtext.tex
#$(CH5SVG)
CH6 = CH6/06filter.tex
#$(CH6SVG)
CH7 = CH7/0701Javascript.tex CH7/0702DOM.tex CH7/0703Event.tex \
      CH7/0704JS-in-svg.tex CH7/0710Event.tex CH7/0720JS-in-svg.tex \
      CH7/0721StopWatch-rev.tex CH7/0730KeyPress.tex \
      CH7/0740MakeObjectsAtStart.tex CH7/0741makecurve.tex \
      CH7/0745OI.tex CH7/0750SelfAnimation.tex CH7/0760HTML.tex \
      CH7/0761ExchangeDataBetweenSVGAndHTML.tex \
      CH7/0790SVGApplication.tex CH7/07svg-withjavascript.tex \
#      $(CH7SVG)
CH8 = CH8/0810php.tex CH8/0820Ajax.tex CH8/08svgwithserver.tex \
#      $(CH8SVG)
#CH1SVG =
CH2SVG = CH2/colorinenv.svg CH2/fick1.svg CH2/linecap.svg \
         CH2/muller-lyer.svg CH2/poggendorff.svg CH2/svg-craik-obraien.svg \
         CH2/svg-gradient-mach.svg CH2/svg-gradient1.svg \
         CH2/svg-ellipse.svg  CH2/svg-delboef.svg\
         CH2/svg-munsterberg.svg \
         CH2/svg-raidalgradiation3.svg CH2/svg-rectangle.svg \
         CH2/svg-reflection.svg CH2/svg-translate-2.svg \
         CH2/svg-translate.svg CH2/svg-white-IO.svg CH2/svg-zavagno.svg
CH3SVG = CH3/svg-arc.svg CH3/svg-bezier-circle4.svg CH3/svg-bezier.svg \
         CH3/svg-bourdon.svg CH3/svg-d.svg \
         CH3/svg-hermann-twinkle-FF.svg \
         CH3/svg-hermann-twinkle.svg CH3/svg-hermann.svg \
         CH3/svg-kanisza.svg CH3/svg-linejoin.svg \
         CH3/svg-morgan-twist.svg CH3/svg-munsterberg-pattern.svg \
         CH3/svg-neon.svg CH3/svg-polygon5.svg CH3/svg-shepard.svg \
         CH3/svg-vint.svg CH3/svg-image.svg CH3/svg-image-pattern.svg \
	 CH3/svg-image-pattern-mask.svg
CH4SVG = CH4/jud-drag.svg CH4/jud.svg CH4/poggendorff-animation.svg \
         CH4/svg-animation-color.svg CH4/svg-animation-rotate.svg \
         CH4/svg-animation-transform-values.svg \
         CH4/svg-animation-transform.svg \
         CH4/svg-animation-visibility.svg \
         CH4/svg-animation-w-rect.svg \
         CH4/svg-bezier-circle4-square.svg CH4/svg-bourdon-animation.svg \
         CH4/svg-fick-animation.svg CH4/svg-mask.svg \
         CH4/svg-morgan-animation.svg CH4/svg-motion-along-path.svg \
         CH4/svg-move-square.svg CH4/svg-moveandsizechange.svg \
         CH4/svg-munsterberg-animation.svg CH4/svg-rect-with-scale.svg \
         CH4/svg-signal.svg CH4/svg-stopwatch.svg
CH5SVG = CH5/svg-moving-text-along-circle.svg \
         CH5/svg-showtext-sjis.svg CH5/svg-text-along-path.svg \
         CH5/svg-text-with-tspan.svg
CH6SVG = CH6/svg-addshadow.svg CH6/svg-colorchart.svg \
         CH6/svg-colorhue-EX.svg CH6/svg-colormatrix.svg \
         CH6/svg-feComposite.svg CH6/svg-feLight-Ex.svg \
         CH6/svg-feLightS.svg CH6/svg-feflood.svg CH6/svg-filterGauss.svg \
         CH6/svg-filterturbulance.svg
CH7SVG = CH7/svg-cycloid-animation-start-click.svg \
         CH7/svg-cycloid-animation.svg CH7/svg-cycloid.svg \
         CH7/svg-event-check.svg CH7/svg-java-add-lines-color.svg \
         CH7/svg-java-add-lines-rev.svg CH7/svg-java-add-lines.svg \
         CH7/svg-java-add-lines-color.svg \
         CH7/svg-java-click-sniff-rev.svg CH7/svg-java-click-sniff.svg \
         CH7/svg-java-click.svg CH7/svg-java-click2-sniff.svg \
         CH7/svg-java-click3-sniff.svg CH7/svg-java-clickanimation2-sniff.svg \
         CH7/svg-java-drag-sniff-rev.svg CH7/svg-java-drag-sniff-rev2.svg \
         CH7/svg-java-drag-sniff.svg CH7/svg-java-showclickpos-html.svg \
         CH7/svg-java-showclickpos-sniff.svg \
         CH7/svg-java-showclickpos2-sniff.svg \
         CH7/svg-java-zollner-animation.svg CH7/svg-java-zollner.svg \
         CH7/svg-neckress-string.svg CH7/svg-pinna.svg \
         CH7/svg-stopwatch-rev.svg
CH8SVG = CH8/svg-npolygon.svg CH8/npolygon-server.html \
         CH8/svg-func.php CH8/svg-npolygon.svg CH8/svg-polygon-ajax.php \
         CH8/svg-polygon.php CH8/test-ajax.html
INSTALL = Install/A01xamppinstall.tex 
MACRO = 00svg-all.tex Macro/svg-macro.tex Macro/mkindex.tex Macro/Browser.tex
Appendix = Appendix/99answer.tex Appendix/color-fff.tex \
           Appendix/99refference.tex \
           Appendix/svg-bezier-interact-3.xml

full: $(FULL).dvi

$(FULL).dvi:
#$(FULLFILES) 
	make TOP="$(FULL)" dvi
$(FULL).pdf: $(FULL).dvi
#	make index
	make TT="$(FULL)" mkpdf2
#	make TT="$(FULL)-ans" mkpdf
pdf:
	make $(FULL).pdf
ref:
	php ref.php $(FULL)000.tex
index:
	php  divideindex.php $(FULL)
	make F="index" indexnn
	make F="indexSVG" indexnn
	make F="indexJS" indexnn
	make F="indexHTML" indexnn
	make F="indexPHP" indexnn
dvi:
	$(PLATEX) $(TOP).tex
#	php  ref.php $(TOP)000.tex
#	$(PLATEX) $(TOP).tex
#	$(PLATEX) $(TOP).tex
#indexnn:
#	nkf -s $(F).idx >ttt2
indexnn:
	nkf -s $(F).idx >ttt2
	php nindex.php
	mendex -S -o $(F).ind -d mydic -s myindex.sty -i <ttt
mkpdf:
	$(PLATEX) $(TT).tex
	$(DVIPS) -z -f $(TT).dvi | bkmk2uni > $(TT).ps
	$(GS) -sOutputFile=$(TT).pdf $(TT).ps
mkpdf2:
	nkf -s $(TT).out >tmp
	mv tmp $(TT).out
	out2uni $(TT)
	$(PLATEX) $(TT).tex
	$(DVI2PDF)  $(TT)
ans:
	php analyse.php $(FULL)>$(FULL)-ansN.tex
	platex $(FULL)-ans
	$(DVI2PDF) -o $(FULL)-ans.pdf $(FULL)-ans.dvi
html:
	php ref2.php $(FULL).aux >HP/index.html
	cp $(FULL).pdf $(FULL)-ans.pdf media-enshuu.pdf HP/
Types1 := html svg js php xml
#Types2 := ref tex
Folders := CH* Appendix Install
#FileList := $(foreach folder, $(Folders), \
#	$(foreach type1, $(Types1), \
#	$(foreach type2, $(Types2),$(folder)/*.$(type1).$(type2))))
FileList := $(foreach folder, $(Folders), \
	$(foreach type1, $(Types1), $(folder)/*.$(type1).*))
test:
	ls $(FileList)
clean:
	rm -f *~ $(TOP).dvi
	rm -f CH*/*~ Appendix/*~ Macro/*~ Install/*~
	rm -f CH*/.#* Appendix/.#* Macro/.#* Install/.#*
	rm -vf  $(FileList)


