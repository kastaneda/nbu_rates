TARGETS := $(shell php list_targets.php)

all: $(TARGETS)

%.json:
	wget "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?date=$*&json" -O $@

.PHONY: all
