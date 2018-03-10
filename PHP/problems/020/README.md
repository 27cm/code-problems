
### Problem #020: The Waterflow Problem

Consider the following picture:

![Waterflow problem](https://raw.githubusercontent.com/27cm/code-problems/master/PHP/problems/020/img/1.png)

In this picture we have walls of different heights. This picture is represented by an array of integers,
where the value at each index is the height of the wall. The picture above is represented with an array
as `[2,5,1,2,3,4,7,7,6]`.

Now imagine it rains. How much water is going to be accumulated in puddles between walls?
The following puddle will be formed:

![Waterflow solution](https://raw.githubusercontent.com/27cm/code-problems/master/PHP/problems/020/img/2.png) 

We count volume in square blocks of 1×1. So in the picture above, everything to the left
of index 1 spills out. Water to the right of index 7 also spills out.
We are left with a puddle between 1 and 6 and the volume is 10.

Write a program to return the volume for any array.

Example:

```bash
$ php ./problem-020.php 2 5 1 2 3 4 7 7 6
10
```
