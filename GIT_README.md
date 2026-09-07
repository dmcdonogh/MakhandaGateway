Written by Dylan McDonogh -> Im copywriting this lol
_READ THIS BEFORE DOING ANY WORK ON THE CODE_

It would help best to watch a video or two on learning how to use git and GitHub before editing code...
Trying to resolve merge conflicts takes a _really_ long time, so try stick to this so much as possible when making any edits

_Connecting to GitHub on VS Code_
{

1.  Create a file anywhere on your computer
2.  Call it any file name relevant to your project (e.g: [MakhandaGateway])
3.  Now that the file is created, go to VS Code
4.  On the left navigation bar, click "Source Control"
5.  In the Source Control Tab, click "Clone Repository"
    -> This is to connect to a repository that already exists
    -> If you want to create another empty repository (nothing inside it), then click initialise repository. <- Don't need to do this now for this project, the repository already exists
6.  At the top of the screen in the search bar, click "Clone from GitHub'
7.  If you need to login to GitHub (using the emails I sent the invite to), continue with that, and once finished, continue here
8.  If you have been added to the MakhandaGateway GitHub repository, it should be visible in the VS Code search bar. Click on it
9.  Click on the file that you want to clone this repository to
10. Now the repository should be cloned to your device... Well done!
    }

Now, once that has been done, next comes actually working on the repository files
_Before_ doing any work, there might have been some changes uploaded to the repository by other colleagues.
You will need to _pull_ these changes from GitHub online, so you can have those changes locally too.
Before that, though, some explanation of how we should upload to and update the repository:

Your own work should only be done in _your own branch_. Creating a branch will be explained later.
Working in your branch, _then_ merging your branch to the main branch _helps prevent merge conflicts_.
If you don't know what those are, you are lucky. Try your best to keep it that way.
If you encounter merge conflicts, and are unsure how to resolve them _after doing some research_, just shout, I'll try help :D

_To pull all changes from the online GitHub_
-> Do this every time _before_ you start working on some new code (again, to prevent merge conflicts later)
{

1.  In VS Code, make sure to have your decided repository clone folder open. This can be done by clicking File->Open Folder->[repository-folder] (this will be your MakhandaGateway folder you created)

2.  Open a terminal: Either press (Ctrl + J), or click Terminal->New Terminal in the nav bar

3.  In terminal, type:
    git switch main
    -> to switch to the main branch, where all the up-to-date files are, or should be
    -> you should see a message/response saying successfully switched to main branch, or already in main branch, or something like that

4.  In terminal, type:
    git pull
    -> terminal will load for a bit, then you should see some files in your local VS Code change somehow, if some updates have been made

5.  _If you already have your own branch_:
    -> To merge these files from the main branch to _your own_ branch, switch to your branch with:
    git switch [your-branch-name]

    -> Merge to your branch with:
    git merge main

    -> Voila! Now you should have all the up-to-date files in _your own_ branch
    }

_Please read this as many times as need be, or any time you start working on the repository files_
Now, to do your own work on the code or any of the files in _your branch_.
When creating a branch, typically, they should be named after the feature you are working on. This could be
anything like: [index_update], [feature_addition], [navbar_update]
{

1.  Ensure that you are _on your own branch_ using:
    git switch [your-branch-name]
    If you haven't created a branch yet, use:
    git switch -c [branch-name]

2.  Do whatever work you need to have done on any files you need to upload, update or delete.

3.  When you are done making changes, or are satisfied with your work, you need to _add_ these updated files to the _stage_
    -> To add one file at a time, in terminal type:
    git add [file-name]

    -> To add all files in your branch (if you've done work on multiple files in your session), type:
    git add .
    The "." means all files

    -> It is most likely that you'll almost always just be adding all the files to the stage when committing, which is completely fine.
    So you'll almost always just use "git add ."

4.  Now that the repository files you want to update are in the stage, you need to commit them.
    When committing, I emphasise, _write comments on the changes you've made_. This makes it easier to check back on previous versions if there is a bug or the project fails/collapses.

    -> To commit your changes, type:
    git commit -m "[your-changes-message-here]"
    e.g. git commit -m "added new page links to the nav bar"

    -> The "-m" allows you to enter your commit message. This helps with communication of changes, and is considered very important in the GitHub world. USE IT ibeg

5.  Now your changes have been committed, you can merge _your branch_ with the _main branch_
    -> To do this, switch to the main branch by typing:
    git switch main

    -> You should see an output message saying your current branch is main, or something like that
    -> Once you have switched to the main branch, you can merge _your branches changes_ to the main branch by typing:
    git merge --squash [your-branch-name]
    Or:
    git merge [your-branch-name]

    -> Congrats! Your changes are now a part of the main branch :D... however:

6.  The changes that you have just committed are only saved locally (on your own device).
    Now comes the time to upload it to the online GitHub repository, so that everyone will be able to see these changes online, and be able to pull those changes to their local device.
    -> To push your changes to the online repo, ensure you are on the main branch:
    git switch main

    -> push your changes by typing:
    git push

And now, for real, you are done! Thank you for your time :D
}

_TL:DR_

_Initialise git repository_

1. git init ->> Don't need to use this for this project; we already have a repository

_To create your own branch_

1. git switch -c [branch-name]

_To switch branches_

1. git switch [branch-name] ->> we have the main branch, and [your-new-feature] branch

===========================================================================================================================================
_Now for adding your changes to the code_
---->> Read this if you don't read anything else <<----
_To add your branch changes to the stage_

1. git add . (for all files)
2. git add [file-name] (for single/specific file) -> likely not gonna use this much I don't think...

_To commit your changes from stage to repo_

1. git commit -m "[your-very-useful-message-here]"

_Push from local to online repo_

1. git push
   -> push both your branch after commits, as well as main branch after merge

_To merge branches_

1. git merge [branch-name]
2. To merge to main before pushing: be on main branch
   git merge [your-branch-name]

_After finishing your new update/feature_
Typically, when you've created a branch for a feature, finished coding that feature, and merged the changes with main and pushed the
changes, it is good practice to delete that feature branch. This helps keep the working branches neat and orderly, not having so many
different branches for different changes/features all up and taking space when not being used.

When you are _finished_ with your new feature, and _merged_ with the main branch, and those changes are committed and _pushed_ to the
online repo, you can delete your now-unused feature branch with:
git branch -D [your-branch-name]

I _emphasise_ please ftlog, only delete a branch after you've merged with the main branch, otherwise you will lose all the work you
have done on your branch and it will be gone (it can be recovered, if you have regularly committed the changes on your branch, but it you have not been committing those changes, and you delete that branch, tough... its all gone. So take heed of this advice)

===========================================================================================================================================
