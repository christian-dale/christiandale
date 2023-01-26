I think C is an awesome programming language, mainly because of it's simplicity.
This is why I decided to make this reference in order to have something to refer to when programming in C.

This reference will be updated periodically.

<style>
    .postCategory {
        margin-bottom: 15px;
    }

    p {
        margin: 0;
    }
</style>

## Keywords of the language

<code class="code">int</code> - 32 bit integer.<br>
<code class="code">double</code> - 64 bit double precition decimal number.

## Standard Library

### stdio.h
void printf(char* format, ...);

### string.h
size_t strlen(char* str);

int isalnum(int ch);

int isalpha(int ch);

int islower(int ch);

int isupper(int ch);

int isdigit(int ch);

int tolower(int ch);

int toupper(int ch);

### stdbool.h
typedef int bool;

### stdlib.h
void* malloc(size_t size);

void* calloc(size_t size, size_t num);

void* realloc(void* ptr, size_t size);

void free(void* ptr);

### math.h
Defines common math function.

double fabs(double val);

double exp(double val);

double log(double val);

double pow(double base, double exp);

double sqrt(double val);

double sin(double val);

double cos(double val);

double tan(double val);

### time.h

Time / date functions.

time_t time(time_t* arg);