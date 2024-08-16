#include<stdio.h>
int main()
{
    int i,j,row,col;
    int a[10][10], b[10][10], c[10][10];
    printf("Enter the number of row and col: ");
    scanf("%d%d",&row,&col);

    for(i=0; i < row; i++)
    {
        for(j=0; j < col; j++)
        {
            printf("a[%d][%d]= ",i,j);
            scanf("%d",&a[i][j]);
        }
        printf("\n");
    }
    for(i=0; i < row; i++)
    {
        for(j=0; j < col; j++)
        {
            printf("b[%d][%d]= ",i,j);
            scanf("%d",&b[i][j]);
        }
        printf("\n");
    }

  /*  for(i=0; i<row; i++)
    {
        for(j=0; j<col; j++)
        {
            printf("%d",a[i][j]);
        }
        printf("\n");
    }

    for(i=0; i<row; i++)
    {
        for(j=0; j<col; j++)
        {
            printf("%d",b[i][j]);
        }
        printf("\n");
    } */

    for(i=0; i < row; i++)
    {
        for(j=0; j < col; j++)
        {
            c[i][j] = a[i][j] + b[i][j] ;
        }
        printf("\n");
    }
    printf("A+B = ");
    for(i=0; i<row; i++)
    {
        for(j=0; j<col; j++)
        {
            printf("  %d ",c[i][j]);  //i use this new line beacause of maching the row and colum

        }
        printf("\n      ");  //i use this new line beacause of maching the row and colum

    }

    return 0;
}
