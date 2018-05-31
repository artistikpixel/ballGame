colors = ['red', 'yellow', 'blue']
balls  = {'red': 1, 'yellow': 2, 'blue': 6}
groups = [ [],[],[] ]
total = 3 * 3


while total > 0:
    for i in range( len(balls) ):
        for j in range( len( groups )):
            if(  balls[colors[i]] > 0 and len(groups[j]) < 3 and groups[j].count(balls[colors[i]]) < 3 ):
                groups[j].append(colors[i])
                balls[colors[i]] -= 1;
                total -= 1
        
        
for i in range(3):
    for j in range(len(groups[i])):
        print groups[i][j]
    print("\n")
