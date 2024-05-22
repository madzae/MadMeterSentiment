CREATE TABLE `kbbi_negative` (
  `id` int(5) NOT NULL,
  `word` text NOT NULL,
  `definition` text DEFAULT NULL,
  `thesaurus` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `kbbi_positive` (
  `id` int(5) NOT NULL,
  `word` text NOT NULL,
  `definition` text DEFAULT NULL,
  `thesaurus` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `kbbi_PhraseNegative` (
  `id` int(5) NOT NULL,
  `phrase` text NOT NULL,
  `definition` text DEFAULT NULL,
  `thesaurus` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

CREATE TABLE `kbbi_PhrasePositive` (
  `id` int(5) NOT NULL,
  `phrase` text NOT NULL,
  `definition` text DEFAULT NULL,
  `thesaurus` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
