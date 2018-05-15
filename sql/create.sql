CREATE TABLE `language` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
	`language` VARCHAR(50) NOT NULL COMMENT 'ISO 639-1 language' COLLATE 'utf8_bin',
	`code` VARCHAR(8) NOT NULL COMMENT 'ISO 639-1 code' COLLATE 'utf8_bin',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `code_unique` (`code`),
	INDEX `code_key` (`code`)
)
COLLATE='utf8_bin'
ENGINE=InnoDB
;

CREATE TABLE `translate` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
	`lang` INT(10) UNSIGNED NOT NULL COMMENT 'Foreign key on language',
	`phrase` INT(10) UNSIGNED NOT NULL COMMENT 'Foreign key on translation_phrase',
	`translation` VARCHAR(127) NOT NULL COMMENT 'Translation text' COLLATE 'utf8_bin',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `lang_phrase_unique` (`lang`, `phrase`),
	INDEX `phrase` (`phrase`),
	INDEX `lang` (`lang`),
	CONSTRAINT `lang` FOREIGN KEY (`lang`) REFERENCES `language` (`id`),
	CONSTRAINT `phrase` FOREIGN KEY (`phrase`) REFERENCES `translation_phrase` (`id`)
)
COLLATE='utf8_bin'
ENGINE=InnoDB
;

CREATE TABLE `translation_phrase` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
	`phrase` VARCHAR(127) NOT NULL COMMENT 'Translation phrase' COLLATE 'utf8_bin',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `phrase_unique` (`phrase`),
	INDEX `phrase_key` (`phrase`)
)
COLLATE='utf8_bin'
ENGINE=InnoDB
;
