TARGETS := $(shell php list_targets.php)

download: $(TARGETS)
.PHONY: downloads

nbu_rates.csv: $(TARGETS)
	php join_dataset.php > $@

nbu_rates.ods: nbu_rates.csv
	# https://wiki.openoffice.org/wiki/Documentation/DevGuide/Spreadsheets/Filter_Options
	libreoffice --headless --infilter="CSV:44,34,76,1,1,1/5" --convert-to ods $<

data/%.json:
	wget -q "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?date=$*&json" -O $@ || rm $@
