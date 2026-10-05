<?php

declare(strict_types=1);

namespace T3\PwComments\Domain\Model;

/*  | This extension is made for TYPO3 CMS and is licensed
 *  | under GNU General Public License.
 *  |
 *  | (c) 2011-2022 Armin Vieweg <armin@v.ieweg.de>
 *  |     2015 Dennis Roemmich <dennis@roemmich.eu>
 *  |     2016-2017 Christian Wolfram <c.wolfram@chriwo.de>
 */
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Vote model (for comments)
 */
class Vote extends AbstractEntity
{
    /** Constant for upvote */
    final public const TYPE_UPVOTE = 1;
    /** Constant for downvote */
    final public const TYPE_DOWNVOTE = 0;
    /** Constant for a vote on the page/entry itself ("like"), not related to a comment */
    final public const TYPE_PAGEVOTE = 2;

    /**
     * @var int uid of the page for what the comment is for
     */
    protected $origPid = 0;

    /**
     * @var int uid of entry for what the page vote is for
     */
    protected $entryUid = 0;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var int unix timestamp
     */
    protected $crdate;

    /**
     * @var FrontendUser
     */
    protected $author;

    /**
     * @var string
     */
    protected $authorIdent;

    /**
     * @var Comment
     */
    protected $comment;

    /**
     * Getter for origPid
     *
     * @return int
     */
    public function getOrigPid()
    {
        return $this->origPid;
    }

    /**
     * Setter for origPid
     *
     * @param int $origPid
     */
    public function setOrigPid($origPid): void
    {
        $this->origPid = $origPid;
    }

    /**
     * Getter for entryUid
     *
     * @return int
     */
    public function getEntryUid()
    {
        return $this->entryUid;
    }

    /**
     * Setter for entryUid
     *
     * @param int $entryUid
     */
    public function setEntryUid($entryUid): void
    {
        $this->entryUid = $entryUid;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set type
     *
     * @param int $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * Get creation date
     *
     * @return int
     */
    public function getCrdate()
    {
        return $this->crdate;
    }

    /**
     * Set creation date
     *
     * @param int $crdate
     */
    public function setCrdate($crdate): void
    {
        $this->crdate = $crdate;
    }

    /**
     * Get author (fe_user)
     *
     * @return FrontendUser
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set author (fe_user)
     */
    public function setAuthor(FrontendUser $author): void
    {
        $this->author = $author;
    }

    /**
     * Get author ident
     *
     * @return string
     */
    public function getAuthorIdent()
    {
        return $this->authorIdent;
    }

    /**
     * Set author ident
     *
     * @param string $authorIpAddress
     */
    public function setAuthorIdent($authorIpAddress): void
    {
        $this->authorIdent = $authorIpAddress;
    }

    /**
     * Is upvote?
     *
     * @return bool
     */
    public function isUpvote()
    {
        return $this->getType() === self::TYPE_UPVOTE;
    }

    /**
     * Is downvote?
     *
     * @return bool
     */
    public function isDownvote()
    {
        return $this->getType() === self::TYPE_DOWNVOTE;
    }

    /**
     * Is page vote?
     *
     * @return bool
     */
    public function isPageVote()
    {
        return $this->getType() === self::TYPE_PAGEVOTE;
    }

    /**
     * Get related comment
     */
    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    /**
     * Set related comment
     */
    public function setComment(Comment $comment): void
    {
        $this->comment = $comment;
    }
}
