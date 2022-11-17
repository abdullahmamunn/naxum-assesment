<?php

function calculateParcetange($customerCount)
{
    switch($customerCount) {
        case $customerCount < 5:
          return 5;
        case $customerCount < 10:
          return 10;
        case $customerCount < 20:
          return 15;
        case $customerCount < 30:
          return 20;
        default:
          return 30;
    }
}
