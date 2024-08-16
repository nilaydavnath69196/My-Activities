
#include <stdio.h>
int main()
{
 for(int i=1; i <=10; i++)
 {
 if(i == 5)
 {
 continue; // terminates the loop when i is equal to 5
 }
 printf("%d", i);
 }
 return 0;
}

