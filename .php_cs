<?php

use Symfony\CS\Config\Config;
use Symfony\CS\Finder\DefaultFinder;
use Symfony\CS\FixerInterface;

$finder = DefaultFinder::create()
    ->in(__DIR__ . '/lib')
    ->in(__DIR__ . '/tests')
;

return Config::create()
    ->level(FixerInterface::PSR0_LEVEL)
    ->fixers([
      'encoding',
      'short_tag',
      'braces',
      'class_definition',
      'elseif',
      'eof_ending',
      'function_call_space',
      'function_declaration',
      'indentation',
      'line_after_namespace',
      'linefeed',
      'lowercase_constants',
      'lowercase_keywords',
      'method_argument_space',
      'multiple_use',
      'parenthesis',
      'php_closing_tag',
      'single_line_after_imports',
      'trailing_spaces',
      'visibility',
      'array_element_no_space_before_comma',
      'array_element_white_space_after_comma',
      'concat_with_spaces',
      'operators_spaces',
      'unused_use',
      'short_array_syntax',
      'standardize_not_equal',
      'ternary_spaces',
      'trim_array_spaces',
      'whitespacy_lines',
      'single_quote',
      'no_blank_lines_before_namespace',
    ])
    ->finder($finder)
;
