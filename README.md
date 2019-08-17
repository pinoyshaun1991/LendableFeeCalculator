Lendable Test - Fee Calculation: How to test
=====

1). From the project root cd into the src file from the terminal and run: "php index.php".

2). After running, it will display the fee value.

3). You can open the index.php file and on line 11, you can change the term value along with the acquired loan amount:
    "$application = new LoanApplication(24, 2750);". 
    
    There has been validation put in place for negative numbers, or numbers outside of it's indented scope.
    
4). PHP Unit has been used in order to carry out tests, from the project root run: 
    "./vendor/bin/phpunit tests". 
    
    20 tests and 23 assertions have been made and have all passed.
