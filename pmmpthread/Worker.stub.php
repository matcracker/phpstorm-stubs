<?php

/**
 * @generate-class-entries
 */

namespace pmmp\thread;

/**
 * Worker
 *
 * Worker Threads have a persistent context, as such should be used over Threads in most cases.
 *
 * When a Worker is started, the run method will be executed, but the Thread will not leave until one
 * of the following conditions are met:
 *   - the Worker goes out of scope (no more references remain)
 *   - the programmer calls shutdown
 *   - the script dies
 * This means the programmer can reuse the context throughout execution; placing objects on the stack of
 * the Worker will cause the Worker to execute the stacked objects run method.
 */
class Worker extends Thread
{
    /**
     * Executes the optional collector on each of the tasks, removing the task if true is returned
     *
     * @param callable $function The collector to be executed upon each task
     * @return int The number of tasks left to be collected
     */
    public function collect(callable $function = null) : int{}

    /**
     * Default collection function called by collect(), if a collect callback wasn't given.
     *
     * @param Runnable $collectable The collectable object to run the collector on
     * @return bool Whether or not the object can be disposed of
     */
    public function collector(Runnable $collectable) : bool{}

    /**
     * Returns the number of threaded tasks waiting to be executed by the referenced Worker
     *
     * @return int An integral value
     */
    public function getStacked() : int{}

    /**
     * Tell if the referenced Worker has been shutdown
     *
     * @return bool A boolean indication of state
	 * @alias pmmp\thread\Thread::isJoined
     */
    public function isShutdown() : bool{}

    /**
     * Shuts down the Worker after executing all the threaded tasks previously stacked
     *
     * @return bool A boolean indication of success
	 * @alias pmmp\thread\Thread::join
     */
    public function shutdown() : bool{}

    /**
     * Appends the referenced object to the stack of the referenced Worker
     *
     * @param Runnable $work object to be executed by the referenced Worker
     *
     * @return int The new length of the stack
     */
    public function stack(Runnable $work) : int{}

    /**
     * Removes the first task (the oldest one) in the stack.
     *
     * @return Runnable|null The item removed from the stack
     */
    public function unstack() : ?Runnable{}

    /**
     * Performs initialization actions when the Worker is started.
     * Override this to do actions on Worker start; an empty default implementation is provided.
     *
     * @return void
     */
    public function run() : void{}
}
